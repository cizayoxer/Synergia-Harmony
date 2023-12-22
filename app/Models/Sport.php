<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sport
 * 
 * @property int $IDSPORT
 * @property string $LIBELLESPORT
 *
 * @package App\Models
 */
class Sport extends Model
{
	protected $table = 'sport';
	protected $primaryKey = 'IDSPORT';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLESPORT'
	];
}
