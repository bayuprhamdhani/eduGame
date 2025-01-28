
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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('lesson')->default(1);
            $table->string('question');
            $table->integer('time');
            $table->unsignedBigInteger('type')->nullable();
            $table->unsignedBigInteger('user')->nullable();
            $table->string('chalenge')->nullable();
            $table->string('answer');
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('type')->references('id')->on('types');
            $table->foreign('user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
