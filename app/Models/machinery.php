<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class machinery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'machinery';

    protected $fillable = [
        'name',
        'model',
        'status',
        'serial_number',
        'image'
    ];
}
