<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'sudtitulo', 'body'];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
