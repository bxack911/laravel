<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->string('key')->index();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('role')->nullable();
            $table->string('icon')->nullable();
            $table->integer('pos')->nullable()->default(0);
            $table->boolean('installed')->default(0);
            $table->boolean('status')->default(0);
            $table->float('version')->default(0.1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
