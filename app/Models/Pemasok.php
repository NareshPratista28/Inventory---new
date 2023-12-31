<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = "pemasok"; // Eloquent akan membuat model Pemasok menyimpan record di tabel Pemasok
    protected $primaryKey = 'idPemasok'; // Memanggil isi DB Dengan primarykey
    public $timestamps = false;
    protected $fillable = [
        'namaPemasok',
        'alamatPemasok',
        'telpPemasok',
        'fotoPemasok'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'pemasok_id', 'idPemasok');
    }
    
}   
    