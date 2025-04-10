<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('san_pham_chi_tiets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('IdSanPham')->constrained('san_phams')->onDelete('cascade');
        $table->integer('Size');
        $table->string('MauSac', 30)->nullable();
        $table->integer('SoLuong')->default(0);
        $table->decimal('Gia', 15, 2);
        $table->string('Anh', 255)->nullable();
        $table->timestamp('NgayCapNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_chi_tiets');
    }
};
