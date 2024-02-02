<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'manga_id',
    ];


    // deux relations "belongsTo" pour indiquer qu'un Like appartient à un utilisateur et à un manga spécifiques.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
