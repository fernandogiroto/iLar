<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActionRegistrationIdToActionHasReceptorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_has_receptors', function (Blueprint $table) {
            $table->unsignedBigInteger('action_registration_id')->after('id');
            $table->foreign('action_registration_id')->references('id')->on('actions_registrations')->onDelete('cascade');
            $table->dropForeign('action_has_receptors_action_id_foreign');
            $table->dropColumn('action_id'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_has_receptors', function (Blueprint $table) {
            $table->dropForeign('action_has_receptors_action_registration_id_foreign');
            $table->dropColumn('action_registration_id');
            $table->unsignedBigInteger('action_id');
            $table->foreign('action_id')->references('id')->on('actions');
        });
    }
}
