<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cour
 * 
 * @property int $IDMATIERE
 * @property int|null $IDSPECIALITE
 * @property string $LIBELLEMATIERE
 *
 * @package App\Models
 */
class Cour extends Model
{
	protected $table = 'cours';
	protected $primaryKey = 'IDMATIERE';
	public $timestamps = false;

	protected $casts = [
		'IDSPECIALITE' => 'int'
	];

	protected $fillable = [
		'IDSPECIALITE',
		'LIBELLEMATIERE'
	];
}
