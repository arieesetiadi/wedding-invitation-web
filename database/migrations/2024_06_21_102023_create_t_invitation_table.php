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
        Schema::create('t_invitation', function (Blueprint $table) {
            $table->id('invitation_id');
            $table->string('invitation_code');
            $table->tinyInteger('num_guest')->default(1);
            $table->string('guest_name', 64);
            $table->boolean('publish')->default(true);
            $table->timestamp('create_date');
            $table->timestamp('modify_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_invitation');
    }
};
