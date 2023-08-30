<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVerifyCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_verify_codes', function (Blueprint $table) {
            $table->id();
	        $table->string('email')->nullable();
	        $table->string('code');
	        $table->boolean('is_verified');
	        $table->string('expire_at');
	        $table->text('reset_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_verify_codes');
    }
}
