<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Badge
 * 
 * @property int $IDBADGE
 * @property string $TITREBADGE
 * @property string|null $PHOTOBADGE
 *
 * @package App\Models
 */
class Badge extends Model
{
	protected $table = 'badge';
	protected $primaryKey = 'IDBADGE';
	public $timestamps = false;

	protected $fillable = [
		'TITREBADGE',
		'PHOTOBADGE'
	];
}
