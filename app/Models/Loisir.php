<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Loisir
 * 
 * @property int $IDSERVICE
 * @property int $IDLOISIR
 *
 * @package App\Models
 */
class Loisir extends Model
{
	protected $table = 'loisir';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'IDLOISIR' => 'int'
	];

	protected $fillable = [
		'IDLOISIR'
	];
}
