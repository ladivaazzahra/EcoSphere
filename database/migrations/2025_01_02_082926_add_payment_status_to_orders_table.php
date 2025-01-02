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
<<<<<<< HEAD:database/migrations/2024_12_28_092815_add_category_name_to_categories_table.php
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('category_name');
            $table->string('category_name')->nullable()->after('id'); // Menambahkan kolom 'category_name'
=======
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_status')->after('product_id')->default('cash on delivery');
>>>>>>> a89f420 (Ladiva final):database/migrations/2025_01_02_082926_add_payment_status_to_orders_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
};
