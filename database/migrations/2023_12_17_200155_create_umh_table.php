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
            $table->double('ltp_jul')->nullable();
            $table->double('ltp_aug')->nullable();
            $table->double('ltp_sep')->nullable();
            $table->double('ltp_okt')->nullable();
            $table->double('ltp_nov')->nullable();
            $table->double('ltp_dec')->nullable();
            $table->double('ltp_jan')->nullable();
            $table->double('ltp_feb')->nullable();
            $table->double('ltp_mar')->nullable();
            $table->double('ltp_apr')->nullable();
            $table->double('ltp_may')->nullable();
            $table->double('ltp_jun')->nullable();

            $table->double('stp_jul')->nullable();
            $table->double('stp_aug')->nullable();
            $table->double('stp_sep')->nullable();
            $table->double('stp_okt')->nullable();
            $table->double('stp_nov')->nullable();
            $table->double('stp_dec')->nullable();
            $table->double('stp_jan')->nullable();
            $table->double('stp_feb')->nullable();
            $table->double('stp_mar')->nullable();
            $table->double('stp_apr')->nullable();
            $table->double('stp_may')->nullable();
            $table->double('stp_jun')->nullable();

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
