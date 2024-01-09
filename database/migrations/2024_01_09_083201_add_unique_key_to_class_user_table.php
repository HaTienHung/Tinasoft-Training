<?php

// Trong file migration add_unique_key_to_class_user_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueKeyToClassUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_users', function (Blueprint $table) {
            // Thêm cặp khóa duy nhất cho user_id và class_id
            $table->unique(['user_id', 'class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_users', function (Blueprint $table) {
            // Xoá cặp khóa duy nhất
            $table->dropUnique(['user_id', 'class_id']);
        });
    }
}
