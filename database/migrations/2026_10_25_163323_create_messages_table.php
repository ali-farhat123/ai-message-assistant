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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('content');
            $table->enum('category', ['complaint', 'inquiry', 'purchase'])->nullable();
            $table->enum('priority', ['urgent', 'normal'])->nullable();
            $table->string('summary')->nullable();
            $table->text('suggested_reply')->nullable();
            $table->enum('status', ['new', 'replied'])->default('new');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
