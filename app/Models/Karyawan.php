<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    // Perhatikan: kita mengisi ID nya, bukan namanya lagi
    protected $fillable = [
        'name',
        'position_id',
        'division_id',
        'salary',
    ];

    // Karyawan "milik" satu Posisi
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Karyawan "milik" satu Divisi
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}