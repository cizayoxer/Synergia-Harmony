<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Annonce
 * 
 * @property int $ID_ANNONCE
 * @property string $TITRE_ANNONCE
 * @property string $DESCRIPTION_ANNONCE
 * @property Carbon $DATE_PUBLICATION
 * @property int $ID_MODERATEUR
 *
 * @package App\Models
 */
class Annonce extends Model
{
	protected $table = 'annonces';
	protected $primaryKey = 'ID_ANNONCE';
	public $timestamps = false;

	protected $casts = [
		'DATE_PUBLICATION' => 'datetime',
		'ID_MODERATEUR' => 'int'
	];

	protected $fillable = [
		'TITRE_ANNONCE',
		'DESCRIPTION_ANNONCE',
		'DATE_PUBLICATION',
		'ID_MODERATEUR'
	];
}
