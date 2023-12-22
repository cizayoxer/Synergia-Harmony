<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeLoisir
 * 
 * @property int $IDLOISIR
 * @property string $LIBELLELOISIR
 *
 * @package App\Models
 */
class TypeLoisir extends Model
{
	protected $table = 'type_loisir';
	protected $primaryKey = 'IDLOISIR';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLELOISIR'
	];
}
