<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_tables', function (Blueprint $table) {
            $table->id();
            $table->string("line_name", 50);
            $table->boolean("status");
            $table->timestamps();
        });
        Schema::table('tramevents', function (Blueprint $table){
            $table->foreign("line_id")->references("id")->on("line_tables");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("tramevents", function (Blueprint $table){
            $table->dropForeign("tramevents_line_id_foreign");
        });
        Schema::dropIfExists('line_tables');

    }
}
