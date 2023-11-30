<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Hebergeur;

class Domaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'proprietaire',
        'date_dachat',
        'date_expiration',
    ];
    public function hebergeur()
    {
        return $this->belongsTo(Hebergeur::class);
    }    
}
