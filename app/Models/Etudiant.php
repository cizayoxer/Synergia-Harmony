<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etudiant
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDNIVEAU
 * @property int|null $IDUTILISATEUR_1
 * @property Carbon|null $DATEVALIDATION
 * @property string $MOTDEPASSE
 *
 * @package App\Models
 */
class Etudiant extends Model
{
	protected $table = 'etudiant';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'IDNIVEAU' => 'int',
		'IDUTILISATEUR_1' => 'int',
		'DATEVALIDATION' => 'datetime'
	];

	protected $fillable = [
		'IDNIVEAU',
		'IDUTILISATEUR_1',
		'DATEVALIDATION',
		'MOTDEPASSE'
	];
}
