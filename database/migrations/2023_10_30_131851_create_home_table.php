<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('section')->nullable();
            $table->string('code')->nullable();
            $table->string('nama')->nullable();
            $table->string('kode_budget')->nullable();
            $table->string('cur')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('amount')->nullable();
            $table->string('order_plan')->nullable();
            $table->string('delivery_plan')->nullable();
            $table->string('fixed')->nullable();
            $table->string('prep')->nullable();
            $table->string('kode_carline')->nullable();
            $table->string('remark')->nullable();
            $table->string('role_id');
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
        Schema::dropIfExists('home');
    }
}
