<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cinema
 * 
 * @property int $IDSERVICE
 * @property string $LIEUFILM
 * @property string $NOMFILM
 * @property Carbon $DATEHEUREFILM
 *
 * @package App\Models
 */
class Cinema extends Model
{
	protected $table = 'cinema';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'DATEHEUREFILM' => 'datetime'
	];

	protected $fillable = [
		'LIEUFILM',
		'NOMFILM',
		'DATEHEUREFILM'
	];
}
