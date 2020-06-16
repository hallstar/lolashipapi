<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_galleries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('offer_id')->unsigned()->index();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('offer_galleries');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
