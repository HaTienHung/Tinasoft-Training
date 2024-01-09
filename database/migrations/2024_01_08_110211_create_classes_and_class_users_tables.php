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
        Schema::create('class_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Thêm foreign key
            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade'); // Hoặc sử dụng 'cascade' nếu bạn muốn xóa các class_users khi class bị xóa
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Hoặc sử dụng 'cascade' nếu bạn muốn xóa các class_users khi class bị xóa
        });
        // Tạo bảng class_users
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_and_class_users_tables');
    }
};
