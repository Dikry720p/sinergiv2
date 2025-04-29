<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perangkat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perangkats';

    protected $fillable = [
        'nama',
        'kategori',
        'tegangan',
        'arus',
        'daya',
        'status',
        'keterangan'
    ];
}
