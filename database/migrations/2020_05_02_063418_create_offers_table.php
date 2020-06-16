<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('broker_id')->unsigned()->index();
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('cascade');

            $table->bigInteger('currency_id')->unsigned()->index();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');

            $table->string('prefix');
            $table->string('title');
            $table->string('short_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('type');
            $table->string('market_type');
            $table->string('status')->nullable();
            $table->dateTime('opening_date');
            $table->dateTime('closing_date');
            $table->bigInteger('unit_price');
            $table->bigInteger('minimum');
            $table->bigInteger('maximum');
            $table->bigInteger('available');
            $table->bigInteger('increment_size');
            $table->boolean('published');
            $table->string('logo')->nullable();
            $table->string('thumbnail_logo')->nullable();
            $table->string('link')->nullable();
            $table->string('research_link')->nullable();

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('offers');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
