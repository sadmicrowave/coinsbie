<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscribe';
    
    /**
	*  Enable the auto-incrementing id field
	*
	*  @var bool
	*/
	public $incrementing = true;
	
}
