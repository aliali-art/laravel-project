<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string("firstName");
            $table->string("da_firstName");
            $table->string("lastName")->nulable();
            $table->string("da_lastName")->nulable();
            $table->string("image")->nulable();
            $table->text("feature_work")->nulable();
            $table->text("da_feature_work")->nulable();
            $table->unsignedInteger("service_id")->nulable();
            $table->string("register_date")->nulable();
            $table->string("salary")->nulable();
            $table->timestamps();
            $table->foreign("service_id")->references("id")->on("services")->onUpdate("cascade")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
