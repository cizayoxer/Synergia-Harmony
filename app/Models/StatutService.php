<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StatutService
 * 
 * @property int $IDSTATUT
 * @property string $LIBELLESTATUT
 *
 * @package App\Models
 */
class StatutService extends Model
{
	protected $table = 'statut_service';
	protected $primaryKey = 'IDSTATUT';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLESTATUT'
	];
}
