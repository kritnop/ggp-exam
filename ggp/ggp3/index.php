<?php
class Truck
{
 	protected function setText($text)
	{
   	// set text here
		if(!isset($text)) $text = 'Hello, customer!';
		return $text;
 	}
}  

class TruckCopy extends Truck
{
 	private function setBodyColor($color)
	{
   	// set color here
		if(!isset($color)) $color = '#BCE323';
		return $color;
 	}

    public function getTruckHtml($color, $text)
	{
	// create the truck with html here 
		return 
	'<div class="container">
		<div class="truck">
			<div class="body">
				<div class="front">
				</div>
				<div class="part1" style="background-color:'.$this->setBodyColor($color).'">
				</div>
				<div class="part2" style="background-color:'.$this->setBodyColor($color).'">
				</div>
				<div class="back">
					'.$this->setText($text).'
				</div>
			</div>
			<div class="wheels">
				<div class="wheel front rotating">
					<div class="inside">
						<div class="core">
						</div>
					</div>
				</div>
				<div class="wheel back rotating">
					<div class="inside">
						<div class="core">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
	}	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>GOGOPRINT #3</title>
	<link rel="stylesheet" href="styles/main.css">
	<style>
		.container {
			position: relative;
			margin: 50px auto;
			clear: both;
		}
	</style>
</head>
<body>
<?php 
$truck_a = (new TruckCopy())->getTruckHtml('#CCE70B','Hello, Ecommerce.'); 
$truck_b = (new TruckCopy())->getTruckHtml('#E5560E','Hi, Magento.'); 


echo $truck_a;
echo '<br />';
echo $truck_b;
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="scripts/main.js"></script>
</body>
</html>