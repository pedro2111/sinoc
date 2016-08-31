<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordenacao extends Model
{
    //

	use SoftDeletes;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = "COORDENACOES";
    protected $primaryKey = "id_coordenacao";



}
