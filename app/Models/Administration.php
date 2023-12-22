<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administration
 * 
 * @property int $IDUTILISATEUR
 *
 * @package App\Models
 */
class Administration extends Model
{
	protected $table = 'administration';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;
}
