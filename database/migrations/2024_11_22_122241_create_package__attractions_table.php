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
        Schema::create('package__attractions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attraction_id');
            $table->unsignedBigInteger('package_id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('attraction_id')->references('id')->on('attractions')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package__attractions');
    }
};
