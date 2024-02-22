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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
//            $table->string('photo')->nullable();
            $table->string('location')->nullable();
            $table->string('mail')->nullable();
            $table->string('phone')->nullable();
            $table->double('price',12,2)->nullable();

            $table->string('type')->nullable(); //suv itp
            $table->string('brand')->nullable(); //marka
            $table->string('fuel')->nullable(); //rodzaj paliwa
            $table->bigInteger('mileage')->nullable()->unsigned(); //przebieg

            $table->boolean('active')->default(1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
