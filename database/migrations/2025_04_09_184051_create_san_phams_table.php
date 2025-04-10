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
    Schema::create('san_phams', function (Blueprint $table) {
        $table->id();
        $table->string('MaSanPham', 20)->unique();
        $table->string('TenSanPham', 100);
        $table->string('ThuongHieu', 50)->nullable();
        $table->text('MoTa')->nullable();
        $table->timestamp('NgayTao')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->boolean('TrangThai')->default(true);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
