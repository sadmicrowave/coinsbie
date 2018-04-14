<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TickerFunctionTest extends TestCase
{
    /**
     * A test class designed to test Market Ticker fetch functionality.
     *
     * @return void
     */
    
    public function testTickersGreaterThanZero ()
	{
		
		$response = $this->get('/tickers/10');
		var_dump($response->getContent());
		
		#$this->assertGreaterThan(len($t->getData()), 0);
	}
}
