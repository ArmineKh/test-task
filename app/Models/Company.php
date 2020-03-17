<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';
   protected $fillable = ['name', 'email', 'website', 'adress'];

   public function employes()
	{
		return $this->hasMany('App\Models\Employe', 'company_id', 'id');
	}

	public function positions()
	{
		return $this->hasMany('App\Models\Position', 'position_id', 'id');
	}
}
