<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class POSTERSONDAGE
 * 
 * @property int $IDSONDAGE
 * @property int $IDUTILISATEUR
 * 
 * @property UTILISATEUR $u_t_i_l_i_s_a_t_e_u_r
 * @property SONDAGE $s_o_n_d_a_g_e
 *
 * @package App\Models
 */
class POSTERSONDAGE extends Model
{
	protected $table = 'POSTER_SONDAGE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDSONDAGE' => 'int',
		'IDUTILISATEUR' => 'int'
	];

	public function u_t_i_l_i_s_a_t_e_u_r()
	{
		return $this->belongsTo(UTILISATEUR::class, 'IDUTILISATEUR');
	}

	public function s_o_n_d_a_g_e()
	{
		return $this->belongsTo(SONDAGE::class, 'IDSONDAGE');
	}
}
