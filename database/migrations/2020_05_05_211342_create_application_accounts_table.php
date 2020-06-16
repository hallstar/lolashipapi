<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateApplicationAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('application_id')->unsigned()->index();
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->index()->nullable();

            $table->boolean('minor')->default(false);
            $table->boolean('confirmed')->default(false);

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('trn')->nullable();
            $table->string('occupation')->nullable();
            $table->string('phone_number')->nullable(); 
            $table->string('identification_link')->nullable();
            $table->string('document_link')->nullable();
            $table->string('other_document_link')->nullable();
            $table->string('signature')->nullable();
            $table->date('signature_affixed_date')->nullable(); 
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
        Schema::dropIfExists('application_accounts');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
