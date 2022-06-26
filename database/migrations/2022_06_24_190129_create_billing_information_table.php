<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_information', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_subscription_id')->unsigned()->nullable();
//            $table->foreign('user_subscription_id')->references('id')->on('user_subscription');

            $table->string('firstName');
            $table->string('lastName');
            $table->string('username');
            $table->string('country');
            $table->string('state');
            $table->string('zip');
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
        Schema::dropIfExists('billing_information');
    }
}
