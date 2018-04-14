<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickers';
    
    /**
	*  Disable the auto-incrementing id field
	*
	*  @var bool
	*/
	public $incrementing = false;
	
	/**
	*  Set the id field type to string
	*
	*  @var string
	*/
	protected $keyType = 'string';
	
}
