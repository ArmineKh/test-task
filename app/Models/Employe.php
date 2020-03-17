<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
	protected $table = 'employes';
   protected $fillable = ['company_id', 'position_id', 'name', 'surname', 'email', 'phone', 'salary'];
}
