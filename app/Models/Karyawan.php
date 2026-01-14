<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    
    protected $fillable = [
    'name',
    'gender',   
    'alamat',   
    'position_id',
    'division_id',
    'salary',
];

    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }


    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}