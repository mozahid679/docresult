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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('FormSerial')->nullable();
            $table->string('pin')->nullable();
            $table->string('roll')->index();
            $table->string('serial')->nullable();
            $table->string('fullName')->nullable();
            $table->string('Gender')->nullable();
            $table->string('TestScore')->nullable();
            $table->string('meritScore')->nullable();
            $table->string('meritPosition')->nullable();
            $table->string('allocatedInstituteCode')->nullable();
            $table->string('allocatedInstituteName')->nullable();
            $table->string('allocationCriteria')->nullable();
            $table->string('allocationStatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
