<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rel2
 * 
 * @property int $IDSPECIALITE
 * @property int $IDUTILISATEUR
 *
 * @package App\Models
 */
class Rel2 extends Model
{
	protected $table = 'rel_2';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDSPECIALITE' => 'int',
		'IDUTILISATEUR' => 'int'
	];
}
