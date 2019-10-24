<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stockid')->default("STN0");
            $table->integer('categoryid');
            $table->integer('productid');
            $table->integer('supplierid');
            $table->integer('buingPrice');
            $table->integer('sellingPrice');
            $table->integer('quantity');
            $table->timestamp('expireDate');
            $table->integer('totalBill');
            $table->integer('pay');
            $table->longText('dis');
            $table->integer('due');
            $table->integer('payMethod');
            $table->timestamp('dueDate')->default(Carbon::now());
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
        Schema::dropIfExists('stocks');
    }
}
