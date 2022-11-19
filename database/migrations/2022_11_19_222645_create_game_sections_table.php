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
        Schema::create('game_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_project_id')->constrained('game_projects')->onDelete('cascade');
            $table->unsignedInteger('part')->nullable();
            $table->string('title',150);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('game_sections');
    }
};
