<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique();
        $table->string('username');
        $table->string('avatar')->nullable(); //imagen de perfil
        $table->text('bio')->nullable(); // Descripcion del usuario
        $table->integer('posts_count')->default(0); //cantidad de publicaciones
        $table->integer('events_joined')->default(0); //eventos en los que participo
        $table->json('achievements')->nullable(); //logros desbloqueados
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
