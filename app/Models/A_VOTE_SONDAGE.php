<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class A_VOTE_SONDAGE extends Model
{
    protected $table = 'A_VOTE_SONDAGE';

    protected $primaryKey = 'NUMEROVOTE';

    public $timestamps = false;

    protected $fillable = [
    'IDSONDAGE',
    'IDUTILISATEUR',
    'AVIS',
    ];

    // Relation avec le sondage
    public function sondage()
    {
        return $this->belongsTo(SONDAGE::class, 'IDSONDAGE');
    }

    // Relation avec l'utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'IDUTILISATEUR');
    }
}
