<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum("level_access", ["ADMIN","BIDANG"])->default("BIDANG");
            $table->enum("bidang", ["SMGT","PPGT","PKBGT","PWGT"])->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('users_login')->insert(
            array(
                'name' => "Administrator",
                'username' => "admin",
                'email' => "admin@gmail.com",
                'password' => "123456",
                'level_access' => "ADMIN",
            )
        );
        // Insert some stuff
        DB::table('users_login')->insert(
            array(
                'name' => "Administrator",
                'username' => "smgt",
                'email' => "smgt@gmail.com",
                'password' => "123456",
                'level_access' => "BIDANG",
                'bidang' => "SMGT",
            )
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_login');
    }
};
