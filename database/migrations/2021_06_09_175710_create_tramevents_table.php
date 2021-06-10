<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrameventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramevents', function (Blueprint $table) {
            $table->id();
            $table->string("image_path", 150)->nullable();
            $table->string("title");
            $table->unsignedBigInteger("author_id")->nullable();
            $table->unsignedBigInteger("line_id");
            $table->unsignedBigInteger("category_id");
            $table->integer("post_status"); // 0- wait to accept 1- accepted 2- denied 3- hidden
            $table->timestamps();
            $table->foreign('author_id')->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramevents');
    }
}
