<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EvenementSportif
 * 
 * @property int $IDSERVICE
 * @property int $IDSPORT
 * @property Carbon $DATEEVENT
 *
 * @package App\Models
 */
class EvenementSportif extends Model
{
	protected $table = 'evenement_sportif';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'IDSPORT' => 'int',
		'DATEEVENT' => 'datetime'
	];

	protected $fillable = [
		'IDSPORT',
		'DATEEVENT'
	];
}
