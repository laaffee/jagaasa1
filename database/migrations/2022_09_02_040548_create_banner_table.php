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
        Schema::create('banner', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('slug', 100);

            $table->foreignId('kategori_id', 11);
            $table->foreign('kategori_id')->references('id')->on('kategori_banners');

            $table->string('gambar', 50);
            $table->date('tgl_publish');
            $table->enum('status',['0','1']);

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
        Schema::dropIfExists('banner');
    }
};
