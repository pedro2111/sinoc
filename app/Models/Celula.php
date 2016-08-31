<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Celula extends Model
{
    //

	use SoftDeletes;

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = "CELULA";
    protected $primaryKey = "id_celula";



}
