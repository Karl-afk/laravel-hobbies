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
        Schema::create('hobby_tag', function (Blueprint $table) {
            $table->string('hobby_id')->nullable();
            $table->string('tag_id')->nullable();
            $table->timestamps();

            $table->primary(['hobby_id', 'tag_id']);

            $table->foreign('hobby_id')->references('id')->on('hobbies')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobby_tag');
    }
};
