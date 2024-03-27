<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SERVICE
 *
 * @property int $IDSERVICE
 * @property int $IDSTATUT
 * @property string $LIBELLESERVICE
 *
 * @property STATUTSERVICE $s_t_a_t_u_t_s_e_r_v_i_c_e
 * @property Collection|ANNONCE[] $a_n_n_o_n_c_e_s
 * @property Cinema $c_i_n_e_m_a
 * @property COVOITURAGE $c_o_v_o_i_t_u_r_a_g_e
 * @property ECHANGECOMPETENCE $e_c_h_a_n_g_e_c_o_m_p_e_t_e_n_c_e
 * @property EVENEMENTSPORTIF $e_v_e_n_e_m_e_n_t_s_p_o_r_t_i_f
 * @property LOISIR $l_o_i_s_i_r
 *
 * @package App\Models
 */
class SERVICE extends Model
{
	protected $table = 'SERVICES';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'IDSTATUT' => 'int'
	];

	protected $fillable = [
		'IDSTATUT',
		'LIBELLESERVICE'
	];

	public function s_t_a_t_u_t_s_e_r_v_i_c_e()
	{
		return $this->belongsTo(StatutService::class, 'IDSTATUT');
	}

	public function a_n_n_o_n_c_e_s()
	{
		return $this->hasMany(Annonce::class, 'IDSERVICE');
	}

	public function c_i_n_e_m_a()
	{
		return $this->hasOne(Cinema::class, 'IDSERVICE');
	}

	public function c_o_v_o_i_t_u_r_a_g_e()
	{
		return $this->hasOne(Covoiturage::class, 'IDSERVICE');
	}

	public function e_c_h_a_n_g_e_c_o_m_p_e_t_e_n_c_e()
	{
		return $this->hasOne(EchangeCompetence::class, 'IDSERVICE');
	}

	public function e_v_e_n_e_m_e_n_t_s_p_o_r_t_i_f()
	{
		return $this->hasOne(EvenementSportif::class, 'IDSERVICE');
	}

	public function l_o_i_s_i_r()
	{
		return $this->hasOne(Loisir::class, 'IDSERVICE');
	}
}
