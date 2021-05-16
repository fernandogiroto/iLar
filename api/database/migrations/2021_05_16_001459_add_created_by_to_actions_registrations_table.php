<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByToActionsRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actions_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->after('notes');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actions_registrations', function (Blueprint $table) {
            $table->dropForeign('actions_registrations_created_by_foreign');
            $table->dropColumn('created_by');
        });
    }
}
