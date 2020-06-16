<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBankBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('bank_id')->unsigned()->index();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('branch_name');
            $table->string('branch_number');
            $table->string('aba_number');
            $table->string('bic');
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
        Schema::dropIfExists('bank_branches');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
