<?php

namespace App\Models;

use App\Models\OrderCode;
use App\Models\OrderProduct;
use App\Http\Traits\WhenTrait;
use App\Http\Traits\MediaTrait;
use App\Http\Traits\ListingTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\AdminOrder\OrderListResource;

class Order extends Model
{
    use ListingTrait,
        MediaTrait,
        WhenTrait,
        SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public function scopeWhenSearch($q, $search)
    {
        if (!$search) {
            return;
        }

        $q->where('code', 'LIKE', '%' . $search . '%')
            ->where('phone_number', 'LIKE', '%' . $search . '%');
    }

    public static function listAdmin($params)
    {
        $item = self::with('products', 'media')
            ->whenSearch($params['search'])
            ->whenWhere('status', request('status'))
            ->whenWhereDate('created_at', '>=', request('from_date'))
            ->whenWhereDate('created_at', '<=', request('to_date'))
            ->sortLimitTotal($params);

        return [
            'list' => OrderListResource::collection($item['list']),
            'total' => $item['total']
        ];
    }

    public static function createWeb($request)
    {
        DB::BeginTransaction();
        $data = $request->only('phone_number', 'customer_name', 'address') + [
            'total' => 0
        ];

        $code = OrderCode::where('type', $request->type)->first();
        if (!$code) {
            $code = OrderCode::create([
                'type' => $request->type,
                'order_id' => 0
            ]);
        }

        $code->update([
            'order_id' => $code->order_id + 1
        ]);

        $data['code'] = strtoupper($request->type) . sprintf('%06d', $code->order_id);

        $order = self::create($data);

        $order->products()->sync(is_array($request->product_ids) ? $request->product_ids : []);

        OrderProduct::where('order_id', $order->id)->get();

        $order->update([
            'total' => request('total_order')
        ]);


        $data = $order->only('id', 'code', 'phone_number', 'address', 'customer_name', 'total', 'created_at') + [
            'products' => $order->products->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'image' => $item->media->url ?? null,
                    'qty' => $item->pivot->qty,
                    'price' => $item->price,
                    'code' => $item->code,
                    'total' => $item->pivot->total
                ];
            })
        ];

        $text = "✅ New Order:" . ' #' . '<strong>' . $data['code'] . '</strong>';
        $text .= "\n Order Date:" . $data['created_at']->format('d-M-Y h:i:s A');
        $text .= "\n Customer Name: " . $data['customer_name'];
        $text .= "\n Phone Number: " . $data['phone_number'];
        $text .= "\n Address: " . $data['address'] ."\n";
        $text .= "\n 🔵 Order Details";
        $text .= "\n__________________________";
        foreach ($data['products'] as $product) {
            $text .= "\n Product Code: " . $product['code'];
            $text .= "\n Product Name: " . $product['name'];
            $text .= "\n Price: " . formatCurrency($product['price']);
            $text .= "\n Quantity: " . $product['qty'];
            $text .= "\n Sub Total: " . formatCurrency($product['total']);
            $text .= "\n__________________________";
        }
        $text .= "\n Grand Total: " . formatCurrency($data['total']);

        //// TelegramBotServiceJob::dispatch('message', config('telegram.bot.chat_id'), $text)->onQueue('normal');
        Telegram::sendMessage([
            'chat_id'     =>  '-882376119',
            'parse_mode'  =>  'HTML',
            'text'        =>  $text
        ]);
        DB::commit();

        return $order;
    }
}
