<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('galleries', function (Blueprint $table) {
        // Kita tambah kolom 'status' dengan pilihan 'draft' atau 'published'
        // Kita set default 'published' agar foto lama otomatis dianggap tayang
        $table->enum('status', ['draft', 'published'])->default('published')->after('title');
    });
}

public function down()
{
    Schema::table('galleries', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
