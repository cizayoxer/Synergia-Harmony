<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Covoiturage
 * 
 * @property int $IDSERVICE
 * @property string $LIEUDEPART
 * @property string $LIEUARRIVE
 * @property Carbon $DATECOVOIT
 *
 * @package App\Models
 */
class Covoiturage extends Model
{
	protected $table = 'covoiturage';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'DATECOVOIT' => 'datetime'
	];

	protected $fillable = [
		'LIEUDEPART',
		'LIEUARRIVE',
		'DATECOVOIT'
	];
}
