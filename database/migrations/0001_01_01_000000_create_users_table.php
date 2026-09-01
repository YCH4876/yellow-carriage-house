<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Every step is guarded so this migration is safe to run against the
     * pre-existing Laravel 8 database, where `users` already holds live
     * accounts. On a fresh database it behaves exactly like Laravel's stock
     * migration.
     */
    public function up(): void
    {
        // Schema is identical to the Laravel 8 users migration, so an existing
        // table needs no alteration - only skipping.
        if (! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        // Laravel 11 renamed password_resets to password_reset_tokens. Rename
        // rather than drop/create so in-flight reset tokens survive.
        if (Schema::hasTable('password_resets') && ! Schema::hasTable('password_reset_tokens')) {
            Schema::rename('password_resets', 'password_reset_tokens');
        } elseif (! Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        if (! Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * WARNING: on the production database this drops the live `users` table.
     * Never run migrate:rollback, migrate:fresh or migrate:refresh there.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
