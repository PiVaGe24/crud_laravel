<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('username');
            $table->string('address');
            $table->string('telephone');
            $table->string('email');
            $table->string('password');
            $table->foreignId('role_id')
                    ->nullable()
                    ->constrained('roles')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            //$table->unsignedBigInteger('role_id')->nullable();

            /*$table->foreign('role_id')
                    ->references('id')->on('roles')
                    ->onDelete('set null');
            */       
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
