<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classe
 * 
 * @property int $IDSPECIALITE
 * @property string $LIBELLESPECIALITE
 *
 * @package App\Models
 */
class Classe extends Model
{
	protected $table = 'classe';
	protected $primaryKey = 'IDSPECIALITE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLESPECIALITE'
	];
}
