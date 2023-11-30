<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Domaine;

class Hebergeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'email',
    ];

    public function domaines()
    {
        return $this->hasMany(Domaine::class);
    }
}
