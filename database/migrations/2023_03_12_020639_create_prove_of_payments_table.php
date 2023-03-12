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
        Schema::create('prove_of_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('username');
            $table->string('user_email');
            $table->integer('payment_option_id')->unsigned();
            $table->string('transaction_code');
            $table->string('prove_of_payment');
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
        Schema::dropIfExists('prove_of_payments');
    }
};
