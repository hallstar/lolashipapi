<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subdomain')->unique();
            $table->string('domain')->nullable()->index();
            $table->longText('config')->nullable(); //store json encoded config here
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->string('hash')->nullable();
            $table->smallInteger('onboard_step')->default(0);
            $table->string('timezone')->default('America/Jamaica');
            $table->string('default_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
