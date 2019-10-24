<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('category_id');
            $table->integer('tag_id');
            $table->integer('view_count')->default(0);
            $table->string('image');
            $table->string('title');
            $table->text('body');
            $table->string('slug')->unique()->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('is_approved')->default(false);

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
}
