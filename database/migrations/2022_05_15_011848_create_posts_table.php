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
      Schema::create('posts', function (Blueprint $table) {
         $table->id();
         $table->string('image');
         $table->string('title');
         $table->string('slug');
         $table->integer('category_id')->unsigned();
         $table->text('content');
         $table->timestamps();
      });
        
      //create pivot table post_tag
      Schema::create('post_tag', function (Blueprint $table) {
         $table->integer('post_id');
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
        Schema::dropIfExists('posts');
    }
};
