<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $IDUTILISATEUR
 * @property string $NOMUTILISATEUR
 * @property string $PRENOMUTILISATEUR
 * @property string $MOTDEPASSE
 * @property int|null $SOLDE
 * @property string $EMAILUTILISATEUR
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'utilisateur';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'SOLDE' => 'int'
	];

	protected $fillable = [
		'NOMUTILISATEUR',
		'PRENOMUTILISATEUR',
		'MOTDEPASSE',
		'SOLDE',
		'EMAILUTILISATEUR'
	];
}
