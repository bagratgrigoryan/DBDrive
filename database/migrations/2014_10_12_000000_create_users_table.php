<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->string('car')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('email_verified_token')->nullable();
            $table->boolean('verified_driver')->default(false);
            $table->boolean('verified_user')->default(false);
            $table->string('plate_number')->nullable();
            $table->float('like')->default(5);
            $table->integer('role');// 1 user , 2 driver
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
