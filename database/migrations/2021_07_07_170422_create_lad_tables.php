<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLadTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->nullableMorphs('user', 'user');
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('avator')->nullable();
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('has_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permission_id');
            $table->text('description')->nullable();
            $table->nullableMorphs('model');
            $table->timestamps();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });

        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option_key');
            $table->text('option_value')->nullable();
            $table->text('description')->nullable();
            $table->string('option_cast')->nullable();
            $table->nullableMorphs('owner');
            $table->timestamps();
        });

        Schema::create('activity_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name')->nullable();
            $table->text('description')->nullable();
            $table->nullableMorphs('causer', 'causer');
            $table->longText('properties')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropMorphs('user');
        });
        Schema::dropIfExists('admins');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('has_permissions');
        Schema::dropIfExists('options');
        Schema::dropIfExists('activity_log');
    }
}
