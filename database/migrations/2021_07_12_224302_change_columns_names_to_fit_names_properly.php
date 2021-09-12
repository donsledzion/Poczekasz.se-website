<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsNamesToFitNamesProperly extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramevents', function (Blueprint $table) {
            $table->dropForeign("tramevents_category_id_foreign");
            $table->renameColumn('category_id', 'eventcategory_id');
            $table->foreign("eventcategory_id")->references("id")->on("tram_event_categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramevents', function (Blueprint $table) {
            $table->dropForeign("tramevents_eventcategory_id_foreign");
            $table->renameColumn('eventcategory_id', 'category_id');
            $table->foreign("category_id")->references("id")->on("tram_event_categories");
        });
    }
}
