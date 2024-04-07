<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SERVICE
 *
 * @property int $IDSERVICE
 * @property int $IDSTATUT
 * @property string $LIBELLESERVICE
 * @property int $typeService
 * @property string|null $description
 * @property int|null $prix
 * @property int|null $IDVENDEUR
 * @property int|null $IDMODERATEUR
 * @property Carbon $DATEPUBLICATION
 * @property Carbon|null $DATEPREVUE
 * @property int $NBPERSONNESMAX
 *
 * @property ETUDIANT|null $e_t_u_d_i_a_n_t
 * @property STATUTSERVICE $s_t_a_t_u_t_s_e_r_v_i_c_e
 * @property TypeService $type_service
 * @property CINEMA $c_i_n_e_m_a
 * @property COVOITURAGE $c_o_v_o_i_t_u_r_a_g_e
 * @property ECHANGECOMPETENCE $e_c_h_a_n_g_e_c_o_m_p_e_t_e_n_c_e
 * @property EVENEMENTSPORTIF $e_v_e_n_e_m_e_n_t_s_p_o_r_t_i_f
 * @property LOISIR $l_o_i_s_i_r
 * @property Collection|Reservation[] $reservations
 *
 * @package App\Models
 */
class SERVICE extends Model
{
	protected $table = 'SERVICES';
	protected $primaryKey = 'IDSERVICE';
	public $timestamps = false;

	protected $casts = [
		'IDSTATUT' => 'int',
		'typeService' => 'int',
		'prix' => 'int',
		'IDVENDEUR' => 'int',
		'IDMODERATEUR' => 'int',
		'DATEPUBLICATION' => 'datetime',
		'DATEPREVUE' => 'datetime',
		'NBPERSONNESMAX' => 'int'
	];

	protected $fillable = [
		'IDSTATUT',
		'LIBELLESERVICE',
		'typeService',
		'description',
		'prix',
		'IDVENDEUR',
		'IDMODERATEUR',
		'DATEPUBLICATION',
		'DATEPREVUE',
		'NBPERSONNESMAX'
	];

	public function e_t_u_d_i_a_n_t()
	{
		return $this->belongsTo(Etudiant::class, 'IDVENDEUR');
	}

	public function s_t_a_t_u_t_s_e_r_v_i_c_e()
	{
		return $this->belongsTo(StatutService::class, 'IDSTATUT');
	}

	public function type_service()
	{
		return $this->belongsTo(TypeService::class, 'typeService');
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

	public function reservations()
	{
		return $this->hasMany(Reservation::class, 'IDSERVICE');
	}

    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'typeService');
    }
}
