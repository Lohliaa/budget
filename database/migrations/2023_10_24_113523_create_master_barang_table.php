<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_barang', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('satuan')->nullable();
            $table->string('account_1')->nullable();
            $table->string('account_2')->nullable();
            $table->string('account_3')->nullable();
            $table->string('account_4')->nullable();
            $table->string('account_5')->nullable();
            $table->string('account_6')->nullable();
            $table->string('account_7')->nullable();
            $table->string('account_8')->nullable();
            $table->string('account_9')->nullable();
            $table->string('account_10')->nullable();
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
        Schema::dropIfExists('master_barang');
    }
}
