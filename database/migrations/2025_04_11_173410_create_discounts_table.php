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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique(); // Unique code for the discount
            $table->string('description')->nullable(); // Description of the discount
            $table->enum('type', ['fixed', 'percentage']); // Discount type
            $table->decimal('value', 8, 2); // e.g. 10 or 10%
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status',['1','0'])->default('1')->comment('1=active, 0=inactive');
            $table->timestamps();
            $table->softDeletes(); // Soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
