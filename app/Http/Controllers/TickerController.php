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

use App\Ticker;
use App\Search;
use Illuminate\Http\Request ;
use App\Http\Requests ;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class TickerController extends Controller
{	
		
	
	public function processForm(Request $request) 
	{
        $search = addslashes($request->search) ;
        return Redirect::to('coin/'. $search) ;
    }
    
    
    /*
	*	Define search route functionality and return view
	*
	*	@param string symbol, Coin ticker symbol to search and gather data from DB
	*
	*	@returns view
	*/
	public function updateCoins ()
	{	
		# Call endpoint URI and return json decoded data string
		$data 	= self::callUri( 'https://api.coinmarketcap.com/v1/ticker/?limit=0' );
		$stack 	= self::formulateInsertQuery($data, self::gatherBitcoinData($data));
		
		self::executeInsertQuery($stack);
		
		/*
		if ( ! self::isFiveMinuteCadence() )
		{
			# Call endpoint URI and return json decoded data string
			$data = self::callUri( 'https://api.coinmarketcap.com/v1/ticker/?limit=0' );
			$stack = self::formulateInsertQuery($data, self::gatherBitcoinData($data));
			self::executeInsertQuery($stack);
		}
		
		# Return view and pass query results to view
		return ( $search ? self::executeSearchQuery($search) : self::executeMainQuery() );
		*/
	}

    
    
    
	/*
	*	Used to issue the connection call to the provided API end point and return JSON data
	*
	*	@param string uri, The API URL end point to gather statistics
	*	@param string method, The cURL method to use while connecting to API end point
	*
	*	@return array, The data gathered from the API end point, converted as json array
	*
	*	@throws	\RuntimeException, When no data is returned from API end point
	*/
	private static function callUri ($uri, $method = 'GET')
	{
		# Determine which CURL Opts Method to use based on method argument
		$optsMethod	=  array('GET' 	=> CURLOPT_HTTPGET
							,'POST' => CURLOPT_POST
							,'PUT'	=> CURLOPT_PUT)[$method];
	
		# Initilize the CURL object
		$curl 	= curl_init();	
		# Setup the CURL connection options
		curl_setopt($curl, CURLOPT_URL, $uri);
		# Ensure results from curl_exec are not printed to screen 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, $optsMethod, 1);
		# Execute the CURL call
		$data = curl_exec( $curl );
		# Close the CURL connection
		curl_close($curl);
		
		# Return data decoded as json object, 'true' denotes making the result an array type
		return json_decode($data, true);
	}
	
	/*
	*	Extracts bitcoin data elements from total list of all coin data.
	*
	*	@param array data, Array of all coin data from full list API call
	*
	*	@returns float, Variable containing bitcoin's market cap in USD
	*
	*/
	public function gatherBitcoinData ($data)
	{
		$bitcoin_market_cap_usd = 0.00;
		
		/* ----- GET BITCOIN ------ */
		# Loop through array of data, and first extract the bitcoin data we need
		foreach ($data as $key => $value) 
		{
			# if the symbol of the coin is bitcoin's symbol, then...
			if ( $value['symbol'] == 'BTC' )
			{
				$bitcoin_market_cap_usd = $value['market_cap_usd'];
				# break out of the loop
				break;
			}
		}
		
		return $bitcoin_market_cap_usd;
	}
	
	/*
	*	Check if data exists within last 5 minutes
	*
	*	@returns bool
	*/
	/*
	public function isFiveMinuteCadence ()
	{
		# Perform the query to determine if any records exist and were created within last 5 minutes
		$tickers = \App\Ticker::whereRaw('created_at > NOW() - INTERVAL 5 MINUTE')->first();
		
		return ( $tickers ? true : false );
	}
	*/

	/*
	*	Formulates DB insert string from json data array
	*
	*	@param array data, Array of all coin data from full list API call
	*	@param float bitcoin_market_cap_usd, Variable containing USD value of Bitcoin market cap
	*
	*	@returns array stack
	*/
	public function formulateInsertQuery ($data, $bitcoin_market_cap_usd)
	{	
		echo $bitcoin_market_cap_usd;
		
		function divide ($dividend, $divisor)
		{
			$quotient = 0;
			
			try
			{
				$quotient = $dividend / $divisor;	
			} catch (DivisionByZeroError $error)
			{
			} finally 
			{
				return $quotient;
			}
		}
		
		# Define initial array holder for insert arrays
		$stack = array();
		
		# Iterate/loop over json data
		foreach($data as $key => $value)
		{
			$price_at_bitcoin_marketcap = divide($bitcoin_market_cap_usd, (int)$value['available_supply']);
			$potential_earning_multiple = divide($price_at_bitcoin_marketcap, (float)$value['price_usd']);
						
			$insert = array(	 'id' 		=> $value['id']
								,'name'		=> $value['name']
								,'symbol'	=> $value['symbol']
								,'rank'		=> $value['rank']
								,'price_usd'=> round($value['price_usd'], 10)
								,'price_btc'=> round($value['price_btc'], 10)
								,'24h_volume_usd'	=> round($value['24h_volume_usd'], 10)
								,'market_cap_usd'	=> round($value['market_cap_usd'], 10)
								,'available_supply'	=> $value['available_supply']
								,'total_supply'		=> $value['total_supply']
								,'max_supply'		=> $value['max_supply']
								,'price_at_bitcoin_marketcap'	=> round($price_at_bitcoin_marketcap, 10)
								,'potential_earning_multiple'	=> round($potential_earning_multiple, 10)
							
							);
			array_push($stack, $insert);
		}
		
		return $stack;
	}

	/*
	*	Insert search criteria in search history log table
	*
	*	@param string search, String containing user search criteria
	*
	*/
	public function logSearch ($search)
	{			
			$ip = 0;
			//Test if it is a shared client
			if ( ! empty($_SERVER['HTTP_CLIENT_IP']) )
			{
			  $ip = $_SERVER['HTTP_CLIENT_IP'];
			  
			//Is it a proxy address
			} elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_FOR']) )
			{
			  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else 
			{
			  $ip = $_SERVER['REMOTE_ADDR'];
			}
		
			# Insert new values 
			\App\Search::insert( array(	 'query'	 => $search
										,'remote_ip_v4' => ip2long( $ip )
									   ) 
								);
	}
	
	/*
	*	Truncate and insert coin data into DB
	*
	*	@param array stack, Array of data to be inserted into database
	*
	*/
	public function executeInsertQuery ($stack = null)
	{
		if ( $stack )
		{
			# Truncate the table first
			\App\Ticker::truncate();
			# Insert new values
			\App\Ticker::insert($stack);
		}
	}
	
	/*
	*	Get coin data from DB for dashboard view
	*
	*	@returns $tickers
	*/
	public function index ($internal_call=False)
	{
		$tickers = \App\Ticker::orderBy('rank', 'asc')
							//->take(50)
							->get();
		
		
		$allTickers = $tickers->toArray();
		$top50 = array_slice($tickers->toArray(), 0, 50);
		
		
		if ($internal_call)
		{
			return $top50;
		}
		
		return view('dashboard')->with(['tickers' => $top50, 'allTickers' => json_encode( $allTickers ) ]);
	}
	
	/*
	*	Get coin data from DB for search view
	*
	*	@param string search, Coin symbol or name to search and return data from DB
	*
	*	@returns $ticker
	*/
	public function search ($search)
	{
		if ( $search ) 
		{
			self::logSearch($search);
			
			$coin = \App\Ticker::where('symbol', '=', $search)
							->orWhere('name', '=', $search)
							->get();
							
			if ( $coin->isEmpty() )			
				\App::abort(404);
			#	return Redirect::to('404');

			$tickers = self::index(True);
		
			return view('coin')->with(['coin' => $coin[0], 'tickers' => $tickers]);
			
		}
		
		
	}
	
	
}

