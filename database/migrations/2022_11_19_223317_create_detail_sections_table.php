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
        Schema::create('detail_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_section_id')->constrained('game_sections')->onDelete('cascade');
            $table->unsignedInteger('part')->nullable();
            $table->enum('type',['D','M','S','E']);
            $table->longText('description');
            $table->string('dialog_with',150)->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('detail_sections');
    }
};
