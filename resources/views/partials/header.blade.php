<!DOCTYPE html>
<html lang="en">
  <head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117090827-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-117090827-1');
	</script>

	<script>
		sessionStorage.setItem("coins", JSON.stringify( {!! $allTickers or '{}' !!} ) ); 	
		sessionStorage.setItem('tableIndex', 50);	
	</script>

	<link rel="icon" href="{{ URL::to('/') }}/public/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="{{ URL::to('/') }}/public/favicon.ico" type="image/x-icon">
	
	<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('/') }}/public/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ URL::to('/') }}/public/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('/') }}/public/favicon-16x16.png">
	<link rel="manifest" href="{{ URL::to('/') }}/public/site.webmanifest">
	<link rel="mask-icon" href="{{ URL::to('/') }}/public/safari-pinned-tab.svg" color="#5bbad5">
	
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<meta name="description" content="Maximizing Cryptocurrency investor's Return on Investment by providing potential earning statistics for cryptocurrencies.">

	  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Coinsbie">
    <title>Coinsbie Calculator | Maximizing Your Investment</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/line-icons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css') }}">        
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
      
  </head>
  <body>