<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_statis', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('slug', 100);
            // kategori id (foreign key)
            $table->foreignId('kategori_id', 11);
            $table->foreign('kategori_id')->references('id')->on('kategori_data');

            $table->text('file');
            $table->text('isi');

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
        Schema::dropIfExists('data_statis');
    }
};
