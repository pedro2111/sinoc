<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Empresa extends Model
{
    //

	use SoftDeletes;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = "EMPRESA";
    protected $primaryKey = "id_empresa";





}
