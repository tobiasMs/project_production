<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_scan')->unique()->nullable()->comment('Nomor kartu scan');
            $table->string('dept')->nullable()->comment('Departemen user');
            $table->string('jabatan')->nullable()->comment('Jabatan user');
            $table->boolean('status_active')->default(true)->comment('Status aktif user');
            $table->string('full_name')->nullable()->comment('Nama lengkap user');
            $table->string('profile')->nullable()->comment('Path foto profil');

            // Hapus kolom name jika ingin menggunakan full_name saja
            // $table->dropColumn('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['no_scan', 'dept', 'jabatan', 'status_active', 'full_name', 'profile']);
        });
    }
}
