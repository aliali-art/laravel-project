<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_demos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->string("da_title");
            $table->text("body")->nulable();
            $table->text("da_body")->nulable();
            $table->string("image")->nulable();
            $table->string("quantity")->nulable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_demos');
    }
}
