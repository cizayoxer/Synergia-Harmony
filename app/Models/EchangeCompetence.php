<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EchangeCompetence
 * 
 * @property int $IDSERVICE
 * @property int $IDMATIERE
 * @property int $IDNIVEAU
 *
 * @package App\Models
 */
class EchangeCompetence extends Model
{
	protected $table = 'echange_competence';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'IDMATIERE' => 'int',
		'IDNIVEAU' => 'int'
	];

	protected $fillable = [
		'IDMATIERE',
		'IDNIVEAU'
	];
}
