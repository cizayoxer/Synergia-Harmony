<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AVOTESONDAGE
 * 
 * @property int $NUMEROVOTE
 * @property int $IDSONDAGE
 * @property int $IDUTILISATEUR
 * @property string $AVIS
 * 
 * @property SONDAGE $s_o_n_d_a_g_e
 * @property UTILISATEUR $u_t_i_l_i_s_a_t_e_u_r
 *
 * @package App\Models
 */
class AVOTESONDAGE extends Model
{
	protected $table = 'A_VOTE_SONDAGE';
	protected $primaryKey = 'NUMEROVOTE';
	public $timestamps = false;

	protected $casts = [
		'IDSONDAGE' => 'int',
		'IDUTILISATEUR' => 'int'
	];

	protected $fillable = [
		'IDSONDAGE',
		'IDUTILISATEUR',
		'AVIS'
	];

	public function s_o_n_d_a_g_e()
	{
		return $this->belongsTo(SONDAGE::class, 'IDSONDAGE');
	}

	public function u_t_i_l_i_s_a_t_e_u_r()
	{
		return $this->belongsTo(UTILISATEUR::class, 'IDUTILISATEUR');
	}
}
