<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOntTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ont', function (Blueprint $table) {
            $table->bigIncrements('id_ont');
            $table->string('ip_address_ont', 15);
            $table->string('sn_ont', 20);
            $table->string('site_id', 15);
            $table->string('type', 20);
            $table->string('alamat', 100);
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('modified_by');
            $table->timestamps();

            $table->foreign('modified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ont');
    }
}
