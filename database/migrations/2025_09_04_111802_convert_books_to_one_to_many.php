<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('author_books')) {
            Schema::dropIfExists('author_books');
        }

        if (Schema::hasTable('books') && ! Schema::hasColumn('books', 'author_id')) {
            Schema::table('books', function (Blueprint $table) {
                $table->foreignId('author_id')->nullable()->after('year')->constrained()->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('books') && Schema::hasColumn('books', 'author_id')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropConstrainedForeignId('author_id');
            });
        }

        if (! Schema::hasTable('author_books')) {
            Schema::create('author_books', function (Blueprint $table) {
                $table->foreignId('author_id')->constrained()->cascadeOnDelete();
                $table->foreignId('book_id')->constrained()->cascadeOnDelete();
                $table->primary(['author_id', 'book_id']);
            });
        }
    }
};
