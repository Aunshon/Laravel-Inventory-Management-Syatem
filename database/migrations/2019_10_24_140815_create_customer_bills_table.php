<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('saleid')->default("PSLN0");
            $table->integer('stockid');
            $table->integer('categoryid');
            $table->integer('buingPrice');
            $table->integer('sellingPrice');
            $table->integer('quantity');
            $table->integer('available');
            $table->integer('totalBill');
            $table->integer('pay');
            $table->integer('due');
            $table->string('dis');
            $table->integer('payMethod');
            $table->integer('customerid');
            $table->integer('sallerid');
            $table->timestamp('dueDate');
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
        Schema::dropIfExists('customer_bills');
    }
}
