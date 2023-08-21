<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->text('problem_description');
            $table->string('email');
            $table->unsignedInteger('phone_number');
            $table->string('reference_number')->unique();
            $table->string('status');
            $table->text('agent_reply')->nullable();
            $table->unsignedInteger('agent_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
