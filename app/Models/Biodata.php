<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendidikan; 
use App\Models\Pengalaman;
use App\Models\Keahlian;

class Biodata extends Model
{
    use HasFactory;
    
    protected $table = 'biodata';
    protected $guarded = [];

    // Definisikan Relasi One-to-Many
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class);
    }

    public function keahlian()
    {
        return $this->hasMany(Keahlian::class);
    }
}