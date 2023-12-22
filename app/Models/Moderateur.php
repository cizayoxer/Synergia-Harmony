<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moderateur
 *
 * @property int $IDUTILISATEUR
 * @property int $R?PUTATION
 *
 * @package App\Models
 */
class Moderateur extends Model
{
	protected $table = 'moderateur';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'REPUTATION' => 'int'
	];

	protected $fillable = [
		'REPUTATION'
	];
}
