<?php 

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    
    protected $table = 'pendidikan'; 
    protected $guarded = [];
    
    // Opsional: Definisikan relasi inverse
    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}