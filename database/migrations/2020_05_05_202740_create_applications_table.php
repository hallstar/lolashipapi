<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Constants\ApplicationStatus;
use App\Constants\ApplicationStep;
use App\Constants\ApplicationEntryType;
use App\Constants\ApplicationType;
use App\Constants\ApplicationMethod;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('reference_number');

            $table->bigInteger('offer_id')->unsigned()->index();
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('broker_id')->unsigned()->index();
            $table->foreign('broker_id')->references('id')->on('brokers')->onDelete('cascade');

            $table->bigInteger('units')->default(0);
            $table->bigInteger('approved_units')->default(0);
            $table->bigInteger('amount')->default(0);
            $table->bigInteger('approved_amount')->default(0);
            $table->string('type')->default(ApplicationType::INDIVIDUAL);
            $table->string('entry_type')->default(ApplicationEntryType::ONLINE);
            $table->integer('step')->default(ApplicationStep::ONE);
            $table->string('status')->default(ApplicationStatus::DRAFT);
            $table->string('method')->default(ApplicationMethod::ELECTRONIC);
            $table->string('form_link')->nullable(); 
            $table->string('signature')->nullable();
            $table->date('signature_affixed_date')->nullable(); 
            $table->date('submitted_on')->nullable(); 
            $table->date('approved_on')->nullable(); 
            $table->bigInteger('approved_by')->unsigned()->index()->nullable(); 
            $table->longText('reason')->nullable(); 

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
        Schema::dropIfExists('applications');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
