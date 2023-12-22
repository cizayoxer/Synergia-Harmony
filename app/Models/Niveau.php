<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Niveau
 * 
 * @property int $IDNIVEAU
 * @property string $LIBELLENIVEAU
 *
 * @package App\Models
 */
class Niveau extends Model
{
	protected $table = 'niveau';
	protected $primaryKey = 'IDNIVEAU';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLENIVEAU'
	];
}
