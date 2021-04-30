<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateActionRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_id');
            $table->string('extraData');
            $table->dateTime('scheduled_to')->nullable();
            $table->tinyInteger('executed')->default(1);
            $table->dateTime('executed_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('notes');
            $table->timestamps();

            $table->foreign('action_id')->references('id')->on('actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions_registrations');
    }
}
