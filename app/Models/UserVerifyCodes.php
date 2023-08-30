<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Password;

class UserVerifyCodes extends Model
{
	protected $guarded = ['created_at', 'updated_at'];

	public static function getVerifyCode($email)
	{
		return self::where('email', $email)->where('expire_at', '>', now())->where('is_verified', 0)->first();
	}

	public static function generateForgetCode($user)
	{
		$expire_at = now()->addMinutes(15);

		return self::create([
			'email' => $user->email,
			'is_verified' => 0,
			'code' => random6digit(),
			'expire_at' => $expire_at
		]);
	}

	/**
	 * Verify Code
	 *
	 * @param $email
	 * @param $code
	 * @return string
	 */
	public static function verifyCode($email, $code)
	{
		$now = now();

		$verify = self::where('email', $email)
			->where('code', $code)
			->where('expire_at', '>', $now->toDateTimeString())
			->where('is_verified', 0)
			->get()
			->first();

		if($verify) {
			$verify->update([
				'reset_token' => Password::getRepository()->createNewToken(),
				'is_verified' => 1
			]);

			return $verify->reset_token;
		}

		return false;
	}

	/**
	 * Verify Forget Token
	 *
	 * @param $token
	 * @param $email
	 * @return bool
	 */
	public static function verifyForgetToken($token, $email)
	{
		$verify = self::where('email', $email)
			->where('reset_token', $token)
			->get()
			->first();

		if($verify) {
			$verify->delete();

			return true;
		}

		return false;
	}
}
