<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Opsional, tapi disarankan
use Illuminate\Database\Eloquent\Model;
use App\Models\Biodata; // Mengimpor Model Biodata

class Pengalaman extends Model
{
    use HasFactory;
    
    // 1. Definisikan nama tabel secara eksplisit (sesuai migration)
    protected $table = 'pengalaman';
    
    // 2. Kolom yang dapat diisi massal (untuk pengujian/seeding)
    protected $guarded = ['id']; 

    // 3. Definisikan relasi inverse ke Model utama
    // Setiap Pengalaman dimiliki oleh satu Biodata
    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}