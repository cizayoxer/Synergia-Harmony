<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Possederbadge
 * 
 * @property int $IDBADGE
 * @property int $IDUTILISATEUR
 *
 * @package App\Models
 */
class Possederbadge extends Model
{
	protected $table = 'possederbadge';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDBADGE' => 'int',
		'IDUTILISATEUR' => 'int'
	];
}
