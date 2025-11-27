<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perawat', function (Blueprint $table) {
            $table->integer('id_perawat')->autoIncrement();
            $table->string('alamat', 100)->nullable();
            $table->string('no_hp', 45)->nullable();
            $table->string('jenis_kelamin', 1)->nullable(); // L atau P
            $table->string('pendidikan', 100)->nullable();
            $table->bigInteger('id_user');
        });
        
        // Add foreign key separately using raw SQL to match column types
        DB::statement('ALTER TABLE perawat ADD CONSTRAINT perawat_id_user_foreign FOREIGN KEY (id_user) REFERENCES user(iduser) ON DELETE CASCADE');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawat');
    }
};
