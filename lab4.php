<html>
<head>
	<title> lab4 </title>
	<meta charset='utf-8'>


	<style>
	td {
 	width: 80px;
  	height: 40px;
	}
	</style>
</head>
<body>
	<?php
		if ($_POST["number"] && $_POST["number"] < 50 && $_POST["number"] > 0) {
			$num = $_POST["number"];
			$db_valid = mysqli_connect("127.0.0.1", "root", "", "valid");
			$query = "INSERT INTO input(value) VALUES (".(int)$_POST["number"].")";
			mysqli_query($db_valid, $query);
		}
		else if ($_POST["number"] && ($_POST["number"] > 50 || $_POST["number"] < 1)) {
			$db_invalid = mysqli_connect("127.0.0.1", "root", "", "invalid");
			$query = "INSERT INTO input(value) VALUES (".$_POST["number"].")";
			mysqli_query($db_invalid, $query);
			echo '<div style="text-align: center"><div class="alert">Please, suggest a number in the range from 1 to 50</div></div>';
			$num = 7;
		}
		else {
			$num = 7;
		} 
	?>

	<form action = "lab4.php" method = "post">
		<input type = "number" name = "number">
		<input type="submit">
	</form>
<table id = "first" border = "1">

<?php
$span = $num ;
$i = 0;
$counter = 1;
echo "<tr>";
echo "<td colspan = \"".($num+1)."\"></td>";
echo "</tr>";
while ($i < $num){
	echo "<tr>";
	$counter++;
	if ($counter%4==0)
	{
		echo "<td rowspan = \"".$span."\">4</td>";
	}
	else
	{
		echo "<td rowspan = \"".$span."\"></td>";
	}
	$counter++;
	if ($counter%4==0)
	{
		echo "<td colspan = \"".$span."\">4</td>";
	}
	else{
		echo "<td colspan = \"".$span."\"></td>";
	}
	$span--;
	$i++;
	echo "</tr>";
}
echo "</table><br>";
echo "<table id = \"second\" border = \"1\">";
$i = 0;
$counter = 0;
$span = $num ;
while ($i < $num){
	echo "<tr>";
	$counter++;
	if ($counter%4==0)
	{
		echo "<td rowspan = \"".($span+1)."\">4</td>";
	}
	else
	{
		echo "<td rowspan = \"".($span+1)."\"></td>";
	}
	$counter++;
	if ($counter%4==0)
	{
		echo "<td colspan = \"".$span."\">4</td>";
	}
	else{
		echo "<td colspan = \"".$span."\"></td>";
	}

	$span--;
	$i++;
	echo "</tr>";
}
	echo "<tr>";
	echo "<td></td>";
	echo "</tr>";
echo "</table><br>";
echo "<table id = \"third\" border = \"1\">";
$i = 0;
$counter = 0;
while($i<$num)
{
	echo '<col width = "100px">';
	$i++;
}
$i = 0;
while($i<$num){
	echo "<tr>";
	if($i%2==0){
		$row = $num;
		while($row>0){
			$counter++;
			if ($row>=2){
				if($counter%4==0){
					echo "<td colspan = \"2\">4</td>";
				} else{
					echo "<td colspan = \"2\" ></td>";
				}
			} else{
				if($counter%4==0){
					echo "<td colspan = \"1\">4</td>";
				} else{
					echo "<td colspan = \"1\" ></td>";
				}
			}
			$row -=2;
		}
	} else{
		$row = ($num - 1);
		$counter++;
		if($counter%4==0){
				echo "<td >4</td>";
		} else{
				echo "<td ></td>";
		}
		while($row > 0){			
			$counter++;

			if ($row>=2){
				if($counter%4==0){
					echo "<td colspan = \"2\">4</td>";
				} else{
					echo "<td colspan = \"2\"></td>";
				}
			} else{
				if($counter%4==0){
					echo "<td>4</td>";
				} else{
					echo "<td></td>";
				}
			}
			$row -=2;
		}
	}
	echo "</tr>";
	$i++;
}
echo "</table><br>";
echo "<table id = \"fourth\" border = \"1\">";

$i = 0;
$counter = 0;
$row = 1;
$array = new SplFixedArray($num);
echo '<tr style="height: 40px">';
for($j = 0; $j<$num ;$j++)
{
	$counter++;
	if ($j%3 == 0){
		echo "<td rowspan = \"3\">";
		$array[$j] = 2;
	}
	if ($j%3 == 1){
		echo "<td rowspan = \"2\">";
		$array[$j] = 1;
	}
	if ($j%3 == 2){
		echo "<td>";
		$array[$j] = 3;
	}
	if($counter%4==0){
		echo "4";
	}
	echo "</td>";
}
echo "</tr>";
while ($i<($num-3)){
	echo '<tr style="height: 40px">';
	for($j = 0; $j<$num ;$j++)
	{
		if ($array[$j] == 1){
			$array[$j] = 3;
		}
		else if ($array[$j] == 2){
			
			$array[$j] = 1;
		}
		else if ($array[$j] == 3){
			$counter++;
			echo "<td rowspan = \"3\">";
			$array[$j] = 2;
			if($counter%4==0){
				echo "4";
			}
		}

	}
	$i++;
	echo "</tr>";
}
echo '<tr style="height: 40px">';
for($j = 0; $j<$num ;$j++)
	{
		if ($array[$j] == 2){	
			$counter++;		
			echo "<td rowspan = \"2\">";
			if($counter%4==0){
				echo "4";
			}
		}
		
	}
echo "</tr>";
echo '<tr style="height: 40px">';
for($j = 0; $j<$num ;$j++)
	{
		if ($array[$j] == 1){	
			$counter++;		
			echo "<td rowspan = \"1\">";
			if($counter%4==0){
				echo "4";
			}
		}
		
	}
echo "</tr>";
?>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="Lab6.js"></script>

</body>
</html>
