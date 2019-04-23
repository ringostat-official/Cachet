<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableIncidentsAddCommentPerpetratorShowCommentShowPerpetratorColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->string('comment');
            $table->integer('perpetrator_id');
            $table->tinyInteger('show_comment')->default('0');
            $table->tinyInteger('show_perpetrator')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incidents', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('perpetrator_id');
            $table->dropColumn('show_comment');
            $table->dropColumn('show_perpetrator');
        });
    }
}
