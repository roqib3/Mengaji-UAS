<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mahasiswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // Menentukan nama tabel yang terkait dengan model ini
    protected $table = 'mahasiswa';
    // Menentukan primary key tabel
    protected $primaryKey = 'nim';
    // Kolom-kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'namaLengkap',
        'nim',
        'prodi',
        'semester',
        'password',
        'foto',
    ];

    // Menonaktifkan timestamps pada model
    public $timestamps = false;
}

