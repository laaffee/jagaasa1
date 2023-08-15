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
        Schema::create('kategori_data', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 20);
            // slug
            $table->string('slug', 20);
            $table->string('isi', 20);
            // create enum
            $table->enum('data_id', ['0', '1'])->default('0');
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
        Schema::dropIfExists('kategori_data');
    }
};
