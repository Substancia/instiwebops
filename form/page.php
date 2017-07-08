<!DOCTYPE HTML>  
<html>
<head>
	<title>Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
th {padding: 10px;}

</style>
</head>

<body>  

<?php
// define variables and set to empty values
$servername= "localhost";
$username="root";
$password="";
$dbname="test";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error)
{
	die("No network!" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $rollno = $_GET["rollno"];
}

$sql ="SELECT * FROM collection WHERE rollno='$rollno'";
$result = $conn->query($sql);
if ($result->num_rows > 0 )
{
	while($row=$result->fetch_assoc())
	{
		$name=$row["name"];
		setcookie('name', $name, time() + (86400 * 30), "/");
		$specialization=$row["specialization"];
		setcookie('specialization', $specialization, time() + (86400 * 30), "/");
		$research=$row["research"];
		setcookie('research', $research, time() + (86400 * 30), "/");
		$abstract=$row["abstract"];
		setcookie('abstract', $abstract, time() + (86400 * 30), "/");
		$publications=$row["publications"];
		setcookie('publications', $publications, time() + (86400 * 30), "/");
		$awards=$row["awards"];
		setcookie('awards', $awards, time() + (86400 * 30), "/");
		$subtext1=$row["subtext1"];
		setcookie('subtext1', $subtext1, time() + (86400 * 30), "/");
		$subtext2=$row["subtext2"];
		setcookie('subtext2', $subtext2, time() + (86400 * 30), "/");
		$subtext3=$row["subtext3"];
		setcookie('subtext3', $subtext3, time() + (86400 * 30), "/");
	}
}else {
	echo "Details not available!";
	die();
}
$conn->close();	


?>

<div style="max-width: 900px; width: 100%; margin: 0 auto; position: relative; background-color:lightblue; border: 1px solid grey;">
	<form>
	<center>
	<table>
		<tr>
			<th><b>Name :</b></th>
			<th><label><?php echo $name;?></label></th>
		</tr>
		<tr>
			<th><b>Roll number :</b></th>
			<th><label><?php echo $rollno;?></label></th>
		</tr>
		<tr>
			<th><b>Specialization :</b></th>
			<th><label><?php echo $specialization;?></label></th>
		</tr>
		<tr>
			<th><b>Title of Research :</b></th>
			<th><label><?php echo $research;?></label></th>
		</tr>
		<tr>
			<th><b>Abstract :</b></th>
			<th><label><?php echo $abstract;?></label></th>
		</tr>
		<tr>
			<th><b>Important publications :</b></th>
			<th><label><?php echo $publications;?></label></th>
		</tr>
		<tr>
			<th><b>Awards obtained, if any :</b></th>
			<th><label><?php echo $awards;?></label></th>
		</tr>
	</table>
	</center>
	<br><br>
	
		<div class="container-fluid">
			
			<div class="row">
				<div class="col-sm-4">
					<div style="background-color:pink; text-align:center; max-width:290px; box-shadow: 10px 10px 5px #888888;">
						<div>
							<img id="blah1" src="images\<?php echo $rollno."_1";?>" alt="your image" height="200px" style="visibility:hidden"/>
						</div>
						<label><?php echo $subtext1;?></label>
					</div>
				</div>

				<div class="col-sm-4">
					<div style="background-color:pink; text-align:center; max-width:290px; box-shadow: 10px 10px 5px #888888;">
						<div>
							<img id="blah2" src="images\<?php echo $rollno."_2";?>" alt="your image" height="200px" style="visibility:hidden"/>
						</div>
						<label><?php echo $subtext2;?></label>
					</div>
				</div>

				<div class="col-sm-4">
					<div style="background-color:pink; text-align:center; max-width:290px; box-shadow: 10px 10px 5px #888888;">
						<div>
							<img id="blah3" src="images\<?php echo $rollno."_3";?>" alt="your image" height="200px" style="visibility:hidden"/>
						</div>
						<label><?php echo $subtext3;?></label>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		
	</form>
</div>

</body>
</html>