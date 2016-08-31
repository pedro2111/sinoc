<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Impacto extends \Eloquent
{
    
	use SoftDeletes;

		protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = "IMPACTO";
    protected $primaryKey = "id_impacto";

}
