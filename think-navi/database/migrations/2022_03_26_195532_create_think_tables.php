<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\Nestedset;

class CreateThinkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThinkFiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('map_position_x')->nullable();
            $table->string('map_position_y')->nullable();
            $table->string('map_scale')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('Thinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ThinkFiles_id');
            $table->string('category')->nullable();
            $table->string('category_group')->nullable();
            $table->string('name')->nullable();
            $table->string('content_border_color');
            $table->string('content_text_color');
            $table->string('content_bg_color');
            $table->string('content_font_size');
            $table->boolean('have_navi')->nullable();
            NestedSet::columns($table);
            $table->timestamps();

            $table->foreign('ThinkFiles_id')->references('id')->on('ThinkFiles')->onDelete('cascade');
        });

        Schema::create('ThinkMemos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('Thinks_id');
            $table->text('memo');
            $table->timestamps();

            $table->foreign('Thinks_id')->references('id')->on('Thinks')->onDelete('cascade');
        });

        Schema::create('ThinkTargetFiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ThinkFiles_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('ThinkFiles_id')->references('id')->on('ThinkFiles')->onDelete('cascade');
        });

        Schema::create('ThinkTargets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('ThinkFileTargets_id');
            $table->string('category');
            $table->string('category_group');
            $table->string('content')->nullable();
            $table->timestamps();

            $table->foreign('ThinkFileTargets_id')->references('id')->on('ThinkTargetFiles')->onDelete('cascade');
        });

        Schema::create('ThinkGoalFiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ThinkFiles_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('ThinkFiles_id')->references('id')->on('ThinkFiles')->onDelete('cascade');
        });

        Schema::create('ThinkGoals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('ThinkFileGoals_id');
            $table->string('category');
            $table->string('category_group');
            $table->string('content')->nullable();
            $table->timestamps();

            $table->foreign('ThinkFileGoals_id')->references('id')->on('ThinkGoalFiles')->onDelete('cascade');
        });

        Schema::create('ThinkGroups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ThinkFiles_id');
            $table->string('category');
            $table->string('content_border_color');
            $table->string('content_text_color');
            $table->string('content_bg_color');
            $table->string('content_font_size');
            $table->timestamps();

            $table->foreign('ThinkFiles_id')->references('id')->on('ThinkFiles')->onDelete('cascade');
        });

        Schema::create('ThinksInGroup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ThinkGroups_id');
            $table->string('name')->nullable();
            $table->string('content_border_color');
            $table->string('content_text_color');
            $table->string('content_bg_color');
            $table->string('content_font_size');
            $table->timestamps();

            $table->foreign('ThinkGroups_id')->references('id')->on('ThinkGroups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Thinks');
    }
}
