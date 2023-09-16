<?php

use App\Enums\News\Status;
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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_category')
                ->constrained('categories')
                ->cascadeOnDelete();
            $table->string('title');
            $table->string('author', 100);
            $table->enum('status', Status::getEnums());
            $table->index('status');
            $table->text('miniDescription');
            $table->text('description');
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
