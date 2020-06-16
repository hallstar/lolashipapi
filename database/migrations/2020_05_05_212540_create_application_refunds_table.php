<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateApplicationRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_refunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');

            $table->bigInteger('bank_id')->unsigned()->index()->nullable();
            $table->bigInteger('bank_branch_id')->unsigned()->index()->nullable();

            $table->string('type');
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_number')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bic')->nullable();
            $table->string('broker_account_number')->nullable();
            
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
        Schema::dropIfExists('application_refunds');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
