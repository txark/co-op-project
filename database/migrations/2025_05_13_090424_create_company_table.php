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
        Schema::create('company', function (Blueprint $table) {
            $table->string('company_id', 5)->primary(); // กำหนด primary key
            $table->string('company_email', 100)->unique(); // เพิ่ม unique() สำหรับอีเมล
            $table->string('company_password', 255); // คอลัมน์รหัสผ่าน
            $table->string('company_name', 255); // คอลัมน์ชื่อบริษัท
            $table->text('company_address')->nullable(); // คอลัมน์ที่อยู่สามารถเป็นค่า null ได้
            $table->timestamps(); // ใช้ timestamps() แทนการสร้างคอลัมน์ created_at และ updated_at
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
