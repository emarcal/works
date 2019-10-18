<!doctype html>
<html lang="en">
    <head>
			<meta charset="utf-8"/>
			<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
			<link rel="icon" type="image/png" href="/img/favicon.png">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
			<title>Blockchain City</title>
			<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
			<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
			<link href="/css/bootstrap.min.css" rel="stylesheet"/>
			<link href="/css/material-kit.css?_<?=time()?>" rel="stylesheet"/>
			<link href="/css/auxiliar.css?_<?=time()?>" rel="stylesheet"/>
			<link href="/css/vertical-nav.css" rel="stylesheet"/>
			<link href="/css/mobile.css?_<?=time()?>" rel="stylesheet"/>
			<link href="/css/demo.css" rel="stylesheet"/>
			<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
			<style>@font-face {font-family: 'Gotham';src: url("/fonts/gotham.otf");}@font-face {font-family: 'Arciform';src: url("/fonts/arciform.otf");}</style>
			<link rel="stylesheet" href="/css/select.css">
			<link rel="stylesheet" href="/css/ImageSelect.css">
    </head>
    <body class="index-page"style="background-image: url('/img/wallpapers.jpg');background-size:cover;background-repeat: no-repeat;">
						<!--- Header --------------------------------------------------------------->
			<div>
				@include('layouts.index.nav') @include('layouts.index.header')
			</div>
			@include('layouts.index.logo')

		<!--- Container ------------------------------------------------------------>
			
		<!--- Footer --------------------------------------------------------------->
		
			
		<!--- Modals --------------------------------------------------------------->
		@include('layouts.index.modals')
									
								
		<script src="/js/jquery.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/material.min.js"></script>
        <script src="/js/moment.min.js"></script>
        <script src="/js/nouislider.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <script src="/js/bootstrap-selectpicker.js" type="text/javascript"></script>
        <script src="/js/bootstrap-tagsinput.js"></script>
        <script src="/js/jasny-bootstrap.min.js"></script>
        <script src="/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
        <script src="/js/modernizr.js" type="text/javascript"></script>
        <script src="/js/vertical-nav.js" type="text/javascript"></script>
        <script src="/js/xchange.js?_<?=time()?>" type="text/javascript"></script>
		<script src="/js/chosen.jquery.js" type="text/javascript"></script>
		<script src="/js/ImageSelect.jquery.js" type="text/javascript"></script>
		<script src="/js/swapper.js?_<?=time()?>" type="text/javascript"></script>
		<script src="/js/swapcalc.js?_<?=time()?>" type="text/javascript"></script>
		<script src="/js/select-flag.js?_<?=time()?>" type="text/javascript"></script>	
	</body>
</html>