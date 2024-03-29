<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ETUDIANT
 * 
 * @property int $IDUTILISATEUR
 * @property int $IDNIVEAU
 * @property int|null $IDUTILISATEUR_1
 * @property Carbon|null $DATEVALIDATION
 * @property string $EMAIL
 * @property string $MOTDEPASSE
 * 
 * @property MODERATEUR|null $m_o_d_e_r_a_t_e_u_r
 * @property NIVEAU $n_i_v_e_a_u
 * @property UTILISATEUR $u_t_i_l_i_s_a_t_e_u_r
 * @property Collection|ETREINCLU[] $e_t_r_e_i_n_c_l_u_s
 * @property Collection|POSSÉDERBADGE[] $p_o_s_sé_d_e_r_b_a_d_g_e_s
 * @property Collection|Reservation[] $reservations
 * @property Collection|SERVICE[] $s_e_r_v_i_c_e_s
 *
 * @package App\Models
 */
class ETUDIANT extends Model
{
	protected $table = 'ETUDIANT';
	protected $primaryKey = 'IDUTILISATEUR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDUTILISATEUR' => 'int',
		'IDNIVEAU' => 'int',
		'IDUTILISATEUR_1' => 'int',
		'DATEVALIDATION' => 'datetime'
	];

	protected $fillable = [
		'IDNIVEAU',
		'IDUTILISATEUR_1',
		'DATEVALIDATION',
		'EMAIL',
		'MOTDEPASSE'
	];

	public function m_o_d_e_r_a_t_e_u_r()
	{
		return $this->belongsTo(MODERATEUR::class, 'IDUTILISATEUR_1');
	}

	public function n_i_v_e_a_u()
	{
		return $this->belongsTo(NIVEAU::class, 'IDNIVEAU');
	}

	public function u_t_i_l_i_s_a_t_e_u_r()
	{
		return $this->belongsTo(UTILISATEUR::class, 'IDUTILISATEUR');
	}

	public function e_t_r_e_i_n_c_l_u_s()
	{
		return $this->hasMany(ETREINCLU::class, 'IDUTILISATEUR');
	}

	public function p_o_s_sé_d_e_r_b_a_d_g_e_s()
	{
		return $this->hasMany(POSSÉDERBADGE::class, 'IDUTILISATEUR');
	}

	public function reservations()
	{
		return $this->hasMany(Reservation::class, 'IDACHETEUR');
	}

	public function s_e_r_v_i_c_e_s()
	{
		return $this->hasMany(SERVICE::class, 'IDVENDEUR');
	}
}
