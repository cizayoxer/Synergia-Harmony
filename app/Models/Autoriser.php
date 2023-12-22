<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Autoriser
 * 
 * @property int $IDPERMISSION
 * @property int $IDUTILISATEUR
 *
 * @package App\Models
 */
class Autoriser extends Model
{
	protected $table = 'autoriser';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDPERMISSION' => 'int',
		'IDUTILISATEUR' => 'int'
	];
}
