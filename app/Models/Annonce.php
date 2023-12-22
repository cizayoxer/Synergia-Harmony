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
 * @property int $IDANNONCE
 * @property int $IDSERVICE
 * @property int $IDUTILISATEUR
 * @property int $IDUTILISATEUR_1
 * @property int $IDUTILISATEUR_2
 * @property string $TITREANNONCE
 * @property string|null $DESCRIPTIONANNONCE
 * @property string $COUTANNONCE
 * @property Carbon $DATEPUBLICATIONANNONCE
 * @property Carbon $DATETRANSACTION
 * @property Carbon $DATEPREVUE
 *
 * @package App\Models
 */
class Annonce extends Model
{
	protected $table = 'annonce';
	protected $primaryKey = 'IDANNONCE';
	public $timestamps = false;

	protected $casts = [
		'IDSERVICE' => 'int',
		'IDUTILISATEUR' => 'int',
		'IDUTILISATEUR_1' => 'int',
		'IDUTILISATEUR_2' => 'int',
		'DATEPUBLICATIONANNONCE' => 'datetime',
		'DATETRANSACTION' => 'datetime',
		'DATEPREVUE' => 'datetime'
	];

	protected $fillable = [
		'IDSERVICE',
		'IDUTILISATEUR',
		'IDUTILISATEUR_1',
		'IDUTILISATEUR_2',
		'TITREANNONCE',
		'DESCRIPTIONANNONCE',
		'COUTANNONCE',
		'DATEPUBLICATIONANNONCE',
		'DATETRANSACTION',
		'DATEPREVUE'
	];
}
