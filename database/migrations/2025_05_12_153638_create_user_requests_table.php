<?php

use App\Enums\UserRequestStatus;
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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('phone', 17);
            $table->string('email', 255)->nullable();
            $table->string('comment', 1000)->nullable();
            $table->integer('plan_id')->nullable();
            $table->string('status')->default(UserRequestStatus::New->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_requests');
    }
};
