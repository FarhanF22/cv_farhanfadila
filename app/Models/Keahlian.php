<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Biodata; // Mengimpor Model Biodata

class Keahlian extends Model
{
    use HasFactory;
    
    // 1. Definisikan nama tabel secara eksplisit (sesuai migration)
    protected $table = 'keahlian';
    
    // 2. Kolom yang dapat diisi massal
    protected $guarded = ['id']; 

    // 3. Definisikan relasi inverse ke Model utama
    // Setiap Keahlian dimiliki oleh satu Biodata
    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}