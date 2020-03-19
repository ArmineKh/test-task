<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	
	protected $table = 'comments';
	
	protected $fillable = ['body', 'company_id', 'comment_company_id'];
	
	public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}
	
}
