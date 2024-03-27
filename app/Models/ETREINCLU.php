<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ETREINCLU
 *
 * @property int $IDSPECIALITE
 * @property int $IDUTILISATEUR
 *
 * @property CLASSE $c_l_a_s_s_e
 * @property ETUDIANT $e_t_u_d_i_a_n_t
 *
 * @package App\Models
 */
class ETREINCLU extends Model
{
	protected $table = 'ETRE_INCLU';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDSPECIALITE' => 'int',
		'IDUTILISATEUR' => 'int'
	];

	public function c_l_a_s_s_e()
	{
		return $this->belongsTo(Classe::class, 'IDSPECIALITE');
	}

	public function e_t_u_d_i_a_n_t()
	{
		return $this->belongsTo(Etudiant::class, 'IDUTILISATEUR');
	}
}
