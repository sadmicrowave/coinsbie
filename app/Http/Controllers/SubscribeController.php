<?php

/*
 * This file is part of the Coinsbie package.
 *
 * (c) Corey Farmer <corey.m.farmer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Http\Request ;
use App\Http\Requests ;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class SubscribeController extends Controller
{	
	
	/*
	*	Insert subscription email into DB
	*
	*	@param array email, data to be inserted into database
	*
	*/
	public function executeInsertQuery ($email = null)
	{
		if ( $email )
		{
			# Insert new values
			\App\Subscribe::insert( array('email' => $email) );
		}
	}
	
	/*
	*	Get email address from DB if exists
	*
	*	@param string email, email address to search and return data from DB
	*
	*	@returns $email
	*/
	public function verifySubscribe ( Request $request )
	{
		$email = $request->email;
		
		if ( $email ) 
		{			
			$result = \App\Subscribe::where('email', '=', $email)
							->get();
							
			if ( $result->isEmpty() ) 
			{
				self::executeInsertQuery ( $email );
				return response()->json(['error' => 0, 'body' => 'You have subscribed!']);
			} else {
				return response()->json(['error' => 1, 'body' => 'You are already subscribed!']);
			}

		}
	}
	
	
}

