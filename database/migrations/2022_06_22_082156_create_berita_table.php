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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('slug', 100);

            // kategori id (foreign key)
            $table->foreignId('kategori_id', 11);
            $table->foreign('kategori_id')->references('id')->on('kategori_berita');

            
            $table->string('foto', 50);
            $table->text('isi');
            $table->date('tgl');
            $table->timestamps();
        });

        //create pivot table post_tag
      Schema::create('berita_tag', function (Blueprint $table) {
        $table->integer('berita_id');
        $table->integer('tag_id');
     });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
};
