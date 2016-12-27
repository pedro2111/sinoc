<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rh extends \Eloquent
{

	use SoftDeletes;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $table = "AGENTE_RH";
	protected $primaryKey = "id_rh";

}
