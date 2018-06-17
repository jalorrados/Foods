<!DOCTYPE html >
<html style="height: 100%;">
<head>

	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/affix.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/tether.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/tether.min.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/bootstrap.min.css">
	<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.toast.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/jquery.toast.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/foods.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/jquery.rateyo.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/bubbles.css">
	<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.rateyo.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/md5.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/checkImageSize.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/Librerias.js"></script>


	
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/breadcrumb.css">

	<script type="text/javascript">

		$(document).ready(function(){
		     $(window).scroll(function () {
		            if ($(this).scrollTop() > 50) {
		                $('#back-to-top').fadeIn();
		            } else {
		                $('#back-to-top').fadeOut();
		            }
		        });
		        // scroll body to 0px on click
		        $('#back-to-top').click(function () {
		            $('body,html').animate({
		                scrollTop: 0
		            }, 800);
		            return false;
		        });

		});
	</script>

</head>

<body>
