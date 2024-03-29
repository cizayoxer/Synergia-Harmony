<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SONDAGE
 *
 * @property int $IDSONDAGE
 * @property string $NOMSONDAGE
 * @property Carbon $DATEDEBUT
 * @property Carbon $DATEFIN
 *
 * @property Collection|AVOTESONDAGE[] $a_v_o_t_e_s_o_n_d_a_g_e_s
 * @property Collection|POSTERSONDAGE[] $p_o_s_t_e_r_s_o_n_d_a_g_e_s
 *
 * @package App\Models
 */
class SONDAGE extends Model
{
	protected $table = 'SONDAGE';
	protected $primaryKey = 'IDSONDAGE';
	public $timestamps = false;

	protected $casts = [
		'DATEDEBUT' => 'datetime',
		'DATEFIN' => 'datetime'
	];

	protected $fillable = [
		'NOMSONDAGE',
		'DATEDEBUT',
		'DATEFIN'
	];

	public function a_v_o_t_e_s_o_n_d_a_g_e_s()
	{
		return $this->hasMany(AVOTESONDAGE::class, 'IDSONDAGE');
	}

	public function p_o_s_t_e_r_s_o_n_d_a_g_e_s()
	{
		return $this->hasMany(POSTERSONDAGE::class, 'IDSONDAGE');
	}

    public function votes()
    {
        return $this->hasMany(A_VOTE_SONDAGE::class, 'IDSONDAGE');
    }
}
