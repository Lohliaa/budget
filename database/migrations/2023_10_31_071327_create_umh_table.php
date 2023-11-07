<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umh', function (Blueprint $table) {
            $table->id();
            $table->string('month')->nullable();
            $table->double('umh')->nullable();
            $table->double('amount')->nullable();
            $table->double('new_umh')->nullable();
            $table->double('new_amount')->nullable();
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
        Schema::dropIfExists('umh');
    }
}
