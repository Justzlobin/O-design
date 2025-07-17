<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->integer('sort')->default(1)->after('is_active');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->integer('sort')->default(1)->after('type');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->integer('sort')->default(1)->after('is_active');
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->integer('sort')->default(1)->after('is_active');
        });

        Schema::table('question_and_answers', function (Blueprint $table) {
            $table->integer('sort')->default(1)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('sort');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('sort');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('sort');
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('sort');
        });

        Schema::table('question_and_answers', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
};
