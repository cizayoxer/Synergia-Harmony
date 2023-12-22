<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Professeur
 * 
 * @property int $IDPROF
 * @property int $IDMATIERE
 * @property int $IDUTILISATEUR
 * @property string $NOMPROF
 * @property string $PRENOMPROF
 *
 * @package App\Models
 */
class Professeur extends Model
{
	protected $table = 'professeur';
	protected $primaryKey = 'IDPROF';
	public $timestamps = false;

	protected $casts = [
		'IDMATIERE' => 'int',
		'IDUTILISATEUR' => 'int'
	];

	protected $fillable = [
		'IDMATIERE',
		'IDUTILISATEUR',
		'NOMPROF',
		'PRENOMPROF'
	];
}
