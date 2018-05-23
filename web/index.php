<!DOCTYPE html>
<html>
<head>
	<title>Cuaca</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<style type="text/css">
		.p0 { padding: 0; }
	</style>
</head>
<body>
	<?php
	if(!isset($_REQUEST['kota'])){
		$kota = 'sleman';
	}else{
		$kota = $_REQUEST['kota'];
	}
	$apikey = "c0c5d891f1d0241b7cd542b041dc77a6";
	$url = "http://api.openweathermap.org/data/2.5/weather?q=".$kota."&APPID=".$apikey;
	@$jsonUrl = file_get_contents($url, False);
	if($jsonUrl !== FALSE){
		$json_idr = json_decode($jsonUrl, true);
	}	
	?>
	<div class="container">
		<br />
		<div class="row" class="text-center">
			<div class="col-md-4">
				<form action="#" class="form-control-">
					<div class="row">
						<div class="col-md-9 p0"><input type="text" name="kota" placeholder="kota" value="<?=$kota;?>" class="form-control"></div>
						<div class="col-md-3 p0"><input class="btn btn-success" style="width: 100%;" type="submit" value="Go" /></div>
					</div>
				</form>				
			</div>
		</div>
		<br />
		<div class="row" class="text-center">
			<div class="col-md-1">				
				<?php if($jsonUrl !== FALSE): ?>
					<img src="http://openweathermap.org/img/w/<?php echo $json_idr['weather'][0]['icon'] ?>.png" />
				<?php endif; ?>
			</div>
			<div class="col-md-3 align-middle">
				<?php if($jsonUrl !== FALSE): ?>			
					<p>
						<?=$kota;?>
						<br />
						<?php echo($json_idr['weather'][0]['description']); ?>
						<br />
						<?php
						$temp = ($json_idr['main']['temp'] - 273.15);
						echo(intval($temp))."&deg; C"; 
						?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- <?php print_r($json_idr); ?> -->
</body>
</html>