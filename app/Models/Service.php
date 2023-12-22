<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $IDSERVICE
 * @property int $IDSTATUT
 * @property string $LIBELLESERVICE
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'IDSTATUT' => 'int'
	];

	protected $fillable = [
		'IDSTATUT',
		'LIBELLESERVICE'
	];
}
