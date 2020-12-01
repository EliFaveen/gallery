<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned();

//            $table->integer('post_id')->unsigned();
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');

            $table->unsignedBigInteger('parent_id')->default(0);

            $table->boolean('approved')->default(0);

            $table->longText('comment');

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
        Schema::dropIfExists('comments');
    }
}
