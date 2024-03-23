<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRiwayat extends Model
{
    use HasFactory;
    protected $table = 'table_riwayat';

    protected $fillable = [
        'operasi',
        'hasil',   
    ];
}
