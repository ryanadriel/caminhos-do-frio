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
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('label', 200);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('permission_role', function (Blueprint $table) {
           $table->bigIncrements('id');

           $table->foreignId('permission_id')->constrained()->cascadeOnDelete();
           $table->foreignId('role_id')->constrained()->cascadeOnDelete();

           $table->timestamps();
           $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
