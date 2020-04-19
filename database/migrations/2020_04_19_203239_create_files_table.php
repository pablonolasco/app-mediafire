<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id_nu_archivo');
            $table->string('ln_nombre');
            $table->string('ln_tipo');
            $table->string('ln_extension');
            $table->integer("id_nu_user")->unsigned();
            $table->timestamps();
            $table->foreign("id_nu_user")->references("id")->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
