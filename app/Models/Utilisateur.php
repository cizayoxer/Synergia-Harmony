<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UTILISATEUR
 * 
 * @property int $IDUTILISATEUR
 * @property string $NOMUTILISATEUR
 * @property string $PRENOMUTILISATEUR
 * @property string $EMAILUTILISATEUR
 * @property string $MOTDEPASSE
 * @property int|null $SOLDE
 * @property int $NBCOOKIES
 * 
 * @property ADMINISTRATION $a_d_m_i_n_i_s_t_r_a_t_i_o_n
 * @property Collection|AUTORISER[] $a_u_t_o_r_i_s_e_r_s
 * @property Collection|AVOTESONDAGE[] $a_v_o_t_e_s_o_n_d_a_g_e_s
 * @property ETUDIANT $e_t_u_d_i_a_n_t
 * @property MODERATEUR $m_o_d_e_r_a_t_e_u_r
 * @property Collection|POSTERSONDAGE[] $p_o_s_t_e_r_s_o_n_d_a_g_e_s
 * @property Collection|PROFESSEUR[] $p_r_o_f_e_s_s_e_u_r_s
 *
 * @package App\Models
 */
class UTILISATEUR extends Model
{
	protected $table = 'UTILISATEUR';
	protected $primaryKey = 'IDUTILISATEUR';
	public $timestamps = false;

	protected $casts = [
		'SOLDE' => 'int',
		'NBCOOKIES' => 'int'
	];

	protected $fillable = [
		'NOMUTILISATEUR',
		'PRENOMUTILISATEUR',
		'EMAILUTILISATEUR',
		'MOTDEPASSE',
		'SOLDE',
		'NBCOOKIES'
	];

	public function a_d_m_i_n_i_s_t_r_a_t_i_o_n()
	{
		return $this->hasOne(ADMINISTRATION::class, 'IDUTILISATEUR');
	}

	public function a_u_t_o_r_i_s_e_r_s()
	{
		return $this->hasMany(AUTORISER::class, 'IDUTILISATEUR');
	}

	public function a_v_o_t_e_s_o_n_d_a_g_e_s()
	{
		return $this->hasMany(AVOTESONDAGE::class, 'IDUTILISATEUR');
	}

	public function e_t_u_d_i_a_n_t()
	{
		return $this->hasOne(ETUDIANT::class, 'IDUTILISATEUR');
	}

	public function m_o_d_e_r_a_t_e_u_r()
	{
		return $this->hasOne(MODERATEUR::class, 'IDUTILISATEUR');
	}

	public function p_o_s_t_e_r_s_o_n_d_a_g_e_s()
	{
		return $this->hasMany(POSTERSONDAGE::class, 'IDUTILISATEUR');
	}

	public function p_r_o_f_e_s_s_e_u_r_s()
	{
		return $this->hasMany(PROFESSEUR::class, 'IDUTILISATEUR');
	}
}
