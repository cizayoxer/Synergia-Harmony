<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $IDPERMISSION
 * @property string $LIBELLEPERMISSION
 * @property int $NIVEAUPERMISSION
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permissions';
	protected $primaryKey = 'IDPERMISSION';
	public $timestamps = false;

	protected $casts = [
		'NIVEAUPERMISSION' => 'int'
	];

	protected $fillable = [
		'LIBELLEPERMISSION',
		'NIVEAUPERMISSION'
	];
}
