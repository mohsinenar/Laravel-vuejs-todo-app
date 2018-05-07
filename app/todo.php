<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
	protected $fillable = [
        'title', 'text', 'timetodo','category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\category');
    }
}
