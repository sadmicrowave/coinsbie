<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historical extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'historical';
    
    /**
	*  Disable the auto-incrementing id field
	*
	*  @var bool
	*/
	public $incrementing = false;
	
	
}
