<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('karyawans', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        
       
        $table->string('gender'); 
        $table->text('alamat');   

        $table->foreignId('position_id')->constrained('positions')->cascadeOnDelete();
        $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
        $table->double('salary');
        $table->timestamps();
    });

}
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};