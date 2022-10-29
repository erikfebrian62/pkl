<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_vote_to_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('candidate_id', 'fk_vote_to_candidate')->references('id')->on('candidates')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('fk_vote_to_user');
            $table->dropForeign('fk_vote_to_candidate');
        });
    }
};
