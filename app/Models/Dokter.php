<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'id_poli',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
    public function pasiens()
    {
    return $this->hasMany(Pasien::class, 'id_dokter'); // Pastikan kolom 'id_dokter' sesuai
    }
}
