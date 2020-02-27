<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('ticket_id');
            $table->string('organisation_name',100);
            $table->string('postal_address',100)->nullable();
            $table->string('physical_address',100)->nullable();
            $table->string('description_brief',100);
            // $table->integer('hours_dedicated')->nullable();
            $table->date('commencement_date');
            $table->date('due_date');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('client_id')->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
