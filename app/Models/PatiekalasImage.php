<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatiekalasImage extends Model
{
    use HasFactory;
    protected $fillable = ['patiekalas_id', 'url'];
}
