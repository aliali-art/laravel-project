<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecievemessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recievemessages', function (Blueprint $table) {
           $table->increments('id');
            $table->string("firstName");
            $table->string("lastName")->nulable()->default("NULL");
            $table->string("email");
            $table->string("company")->nulable()->default("NULL");
            $table->string("phone");
            $table->text("message");
            $table->string("country")->nulable()->default("NULL");
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
        Schema::dropIfExists('recievemessages');
    }
}
