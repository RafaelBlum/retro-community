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
        Schema::table('campaings', function (Blueprint $table) {
            $table->foreignId('channel_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->text('content');
            $table->string('linkGoal');
            $table->string('qrCode')->nullable();
            $table->string('linkPagePix');
            $table->boolean('camping');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaings', function (Blueprint $table) {
            //
        });
    }
};
