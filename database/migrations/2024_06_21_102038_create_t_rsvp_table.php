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
        Schema::create('t_rsvp', function (Blueprint $table) {
            $table->id('rsvp_id');
            $table->foreignId('invitation_id')->nullable()->constrained('t_invitation', 'invitation_id');
            $table->string('full_name', 64);
            $table->string('phone', 20);
            $table->boolean('attendance');
            $table->tinyInteger('num_guest')->nullable()->default(1);
            $table->string('guest2name', 64)->nullable();
            $table->string('guest3name', 64)->nullable();
            $table->string('guest4name', 64)->nullable();
            $table->string('guest5name', 64)->nullable();
            $table->text('greetings');
            $table->timestamp('create_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_rsvp');
    }
};
