<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->foreign('band_id')->references('id')->on('bands');
        });

        Schema::table('bands', function($table) {
        $table->foreign('leader_id')->references('id')->on('users');
        });

        Schema::table('folders', function($table){
            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::table('files', function($table){
            $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('bands');
        Schema::dropIfExists('folders');
        Schema::dropIfExists('files');
    }
}
