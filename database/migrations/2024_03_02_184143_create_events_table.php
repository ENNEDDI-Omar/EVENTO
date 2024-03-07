<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organisator_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->date('date');
            $table->string('capacity');
            $table->string('available_seats');
            $table->enum('event_status', ['pending', 'accepted', 'refused'])->default('pending');
            $table->enum('reservation_type', ['automatique', 'manuel'])->default('automatique');
            $table->string('price');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('organisator_id')->references('id')->on('organisators')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
