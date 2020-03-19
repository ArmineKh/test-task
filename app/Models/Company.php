<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
	protected $table = 'companies';
   protected $fillable = ['name', 'email', 'website', 'adress', 'logo', 'password'];

protected $hidden = [
        'password', 'remember_token',
    ];

 public function getAuthPassword()
    {
      return $this->password;
    }

   public function employes()
	{
		return $this->hasMany('App\Models\Employe', 'company_id', 'id');
	}

	public function positions()
	{
		return $this->hasMany('App\Models\Position');
	}

	public function comments()
	{
		return $this->hasMany('App\Models\Comment');
	}
}
