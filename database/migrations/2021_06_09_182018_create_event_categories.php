<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tram_event_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->timestamps();
        });
        Schema::table('tramevents', function (Blueprint $table){
            $table->foreign("category_id")->references("id")->on("tram_event_categories");
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
            $table->dropForeign("tramevents_category_id_foreign");
        });
        Schema::dropIfExists('tram_event_categories');

    }
}
