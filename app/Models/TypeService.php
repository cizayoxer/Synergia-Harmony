<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeService
 *
 * @property int $id_Type_Service
 * @property string $libelle_Type_Service
 *
 * @property Collection|SERVICE[] $s_e_r_v_i_c_e_s
 *
 * @package App\Models
 */
class TypeService extends Model
{
	protected $table = 'type_service';
	protected $primaryKey = 'id_Type_Service';
	public $timestamps = false;

	protected $fillable = [
		'libelle_Type_Service'
	];

	public function s_e_r_v_i_c_e_s()
	{
		return $this->hasMany(Service::class, 'typeService');
	}


    public function services()
    {
        return $this->hasMany(Service::class, 'typeService');
    }
}
