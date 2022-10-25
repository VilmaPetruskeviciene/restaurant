<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoranas extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'town', 'address', 'work_time'];

    public function patiekalai()
    {
        return $this->hasMany(Patiekalas::class, 'restoranas_id', 'id');
    }


}
