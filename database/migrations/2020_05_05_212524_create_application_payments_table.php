<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateApplicationPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');

            $table->bigInteger('amount')->default(0);
            $table->string('type');
            $table->string('institution')->nullable();
            $table->string('confirmation_reference')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_account_number')->nullable();
            $table->string('transit_code')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('broker_account_number')->nullable();
            $table->string('source_of_funds')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('link')->nullable();
            $table->string('other_link')->nullable();
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
        Schema::dropIfExists('application_payments');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
