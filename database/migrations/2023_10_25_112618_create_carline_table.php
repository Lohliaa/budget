<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carline', function (Blueprint $table) {
            $table->id();
            $table->string('destination_ppc')->nullable();
            $table->string('hfm_carline')->nullable();
            $table->string('model_year')->nullable();
            $table->string('kode')->nullable();
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
        Schema::dropIfExists('carline');
    }
}
