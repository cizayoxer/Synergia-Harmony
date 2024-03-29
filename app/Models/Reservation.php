<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 * 
 * @property int $IDRESERVATION
 * @property int $IDACHETEUR
 * @property Carbon $DATETRANSACTION
 * @property int $IDSERVICE
 * 
 * @property ETUDIANT $e_t_u_d_i_a_n_t
 * @property SERVICE $s_e_r_v_i_c_e
 *
 * @package App\Models
 */
class Reservation extends Model
{
	protected $table = 'Reservation';
	protected $primaryKey = 'IDRESERVATION';
	public $timestamps = false;

	protected $casts = [
		'IDACHETEUR' => 'int',
		'DATETRANSACTION' => 'datetime',
		'IDSERVICE' => 'int'
	];

	protected $fillable = [
		'IDACHETEUR',
		'DATETRANSACTION',
		'IDSERVICE'
	];

	public function e_t_u_d_i_a_n_t()
	{
		return $this->belongsTo(ETUDIANT::class, 'IDACHETEUR');
	}

	public function s_e_r_v_i_c_e()
	{
		return $this->belongsTo(SERVICE::class, 'IDSERVICE');
	}
}
