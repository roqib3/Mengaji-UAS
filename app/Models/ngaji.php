<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ngaji extends Model
{
    use HasFactory;
    // Menentukan nama tabel yang terkait dengan model ini
    protected $table = 'ngaji';

    // Kolom-kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'id_ngaji',
        'rekaman',
        'juz',
        'surah',
        'ayat',
        'nim',
    ];
    // Menentukan primary key tabel
    protected $primaryKey = 'id_ngaji';
    
    // Menentukan apakah primary key akan secara otomatis bertambah nilai atau tidak
    public $incrementing = true;
    
    // Menentukan tipe data dari primary key
    protected $keyType = 'int';
}
