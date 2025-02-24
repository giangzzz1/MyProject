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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('role')->default(0);
            $table->string('provider')->nullable(); // Facebook/Google
            $table->string('provider_id')->nullable(); // ID từ Facebook/Google
            $table->string('avatar')->nullable(); // Avatar người dùng
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); // Nullable vì người dùng có thể không cần mật khẩu
            $table->rememberToken();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
