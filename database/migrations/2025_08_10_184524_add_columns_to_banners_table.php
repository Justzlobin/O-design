<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('description')
                ->nullable()
                ->after('title');
            $table->date('date')
                ->nullable()
                ->after('description');
            $table->string('location')
                ->nullable()
                ->after('date');
            $table->float('area')
                ->nullable()
                ->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('date');
            $table->dropColumn('location');
            $table->dropColumn('area');
        });
    }
};
