<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gestor extends \Eloquent
{
    
	use SoftDeletes;

		protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = "GESTOR_COORDENACAO";
    protected $primaryKey = "id_gestor";

}
