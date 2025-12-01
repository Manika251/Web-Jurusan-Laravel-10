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
    Schema::table('akreditasis', function (Blueprint $table) {
        // Defaultnya 'draft' agar aman (tidak langsung muncul)
        $table->string('status')->default('draft')->after('tahun'); 
    });
}

public function down()
{
    Schema::table('akreditasis', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
