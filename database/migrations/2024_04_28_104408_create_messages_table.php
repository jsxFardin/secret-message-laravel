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
            $table->uuid('identifier')->unique();
            $table->text('text');
            $table->foreignId('recepient_id')->constrained(
                table: 'users', indexName: 'messages_recepient_id_foreign'
            );
            $table->foreignId('sender_id')->constrained(
                table: 'users', indexName: 'messages_sender_id_foreign'
            );
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
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
