<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            background-color: #eee;
            font-family: 'Montserrat', sans-serif
        }

        .card {
            border: none;

            /* border-radius: 20px; */
        }

        .logo {
            /* background-color: rgba(0, 138, 227, 0.8) */
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            /* background-color: rgba(0, 138, 227, 0.8) */
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #555
        }

        div .uppercase {
            text-transform: uppercase
        }

        .product {
            /* background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.9)), url({{ asset('logo/papadeliver_v2.png') }}); */
            /* background: linear-gradient(rgba(255, 255, 255, 0.93), rgba(255, 255, 255, 0.94)), url('https://emenu-development-admin.rorean.com/adminlte/img/emenu-black-transparent.png'); */
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            background-size: 50%;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="invoice pt-0 pb-0 p-5">
            {{--  <h5 class="uppercase">We've received your order!</h5>  --}}
            {{--  <span class="font-weight-bold d-block mt-4">Hello customer!</span> <span>You'll find a summary of your ordering below!</span>  --}}
            <h3 class="mt-3 text-center">ORDER SUMMARY</h3>
            <div class="payment border-top mt-3 mb-2 border-bottom table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <div class="py-2">
                                    <span class="d-block text-muted">Order Date</span>
                                    <span>{{ $data['created_at'] }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="py-2">
                                    <span class="d-block text-muted">Order No</span>
                                    <span>{{ '#' . sprintf("%'.06d", $data['code']) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="py-2">
                                    <span class="d-block text-muted">Phone Number</span>
                                    <span>{{ $data['phone_number'] }}</span>
                                </div>
                                <div class="py-2">
                                    <span class="d-block text-muted">Customer Name</span>
                                    <span>{{ $data['customer_name'] }}</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="product border-bottom table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th class="text-center">QTY</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['products'] as $index => $list)
                            <tr style="height: 88px">
                                <td width="50%"> <span class="font-weight-bold">{{ $list['name'] }}</span></td>
                                <td width="10%" class="text-center">
                                    <span class="d-block">{{ $list['qty'] }}</span>
                                </td>
                                <td width="20%" class="text-right">
                                    <span
                                        class="d-block">{{ $list['total'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-center mb-0 mt-5" style="font-size: 12px">POWERED BY:</p>
            <div class="text-center">
                <img src="{{ asset('logo/papadeliver_v2.png') }}" width="80">
            </div>

        </div>
        {{--  <div class="d-flex justify-content-between footer" style="padding: 19px 20px;"><span style="color: white">Need help? Contact us: <b>{{ $data['restaurant']['phone_number'] }}</b> </span> <span style="color: white">POWERED BY: <img style="margin-top: -5px" src="https://emenu-development-admin.rorean.com/adminlte/img/emenu-secondary-transparent.png" alt="" width="50"></span></div>  --}}
    </div>
</body>

</html>
