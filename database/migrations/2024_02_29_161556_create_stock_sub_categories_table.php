<?php

use App\Models\Company;
use App\Models\StockCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Company::class);
            $table->foreignIdFor(StockCategory::class);

            $table->string('name')->change();
            $table->text('description')->nullable();
            $table->string('status')>nullable()->default('active')->change();
            $table->text('image')->nullable();
            
            $table->bigInteger('buying_price')->nullable()->default(0);
            $table->bigInteger('selling_price')->nullable()->default('0');
            $table->bigInteger('expected_profit')->nullable()->default('0');
            $table->bigInteger('earn_profit')->nullable()->default('0');
            $table->string('measuring_unit');
            $table->bigInteger('current_quantity')->nullable()->default('0');
            $table->bigInteger('reorder_level')->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_sub_categories');
    }
};
