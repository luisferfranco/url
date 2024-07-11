<?php

use App\Models\User;
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
    Schema::create('ligas', function (Blueprint $table) {
      $table->id();

      $table->string('titulo')->nullable();
      $table->string('personalizado')->nullable();
      $table->string('original');
      $table->string('corto');
      $table->foreignIdFor(User::class)->nullable();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('ligas');
  }
};
