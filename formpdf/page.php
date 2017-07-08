<?php
require('fpdf.php');

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
}

// define variables and set to empty values
$servername= "localhost";
$username="root";
$password="";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $rollno = $_GET["rollno"];
}

$sql = "SELECT COUNT(*) from collection WHERE rollno='$rollno'";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_GET['id'], PDO::PARAM_INT);
$stmt->execute();

if($stmt->fetchColumn())
{	$sql ="SELECT * FROM collection WHERE rollno='$rollno'";
	foreach ($conn->query($sql) as $row) {
		$name = $row['name'];
		$specialization=$row["specialization"];
		$research=$row["research"];
		$abstract=$row["abstract"];
		$publications=$row["publications"];
		$awards=$row["awards"];
		$subtext1=$row["subtext1"];
		$subtext2=$row["subtext2"];
		$subtext3=$row["subtext3"];
	}
} else {
	echo "Details not available!";
	die();
}
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$conn = null;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(60,10,'Name: ',0,0);
$pdf->Cell(60,10,$name,1,1,'C');
$pdf->Cell(60,10,'Roll number: ',0,0);
$pdf->Cell(60,10,$rollno,1,1,'C');
$pdf->Cell(60,10,'Specialization: ',0,0);
$pdf->Cell(60,10,$specialization,1,1,'C');
$pdf->Cell(60,10,'Research: ',0,0);
$pdf->Cell(60,10,$research,1,1,'C');
$pdf->Cell(60,10,'Abstract: ',0,0);
$pdf->Cell(60,10,$abstract,1,1,'C');
$pdf->Cell(60,10,'Publications: ',0,0);
$pdf->Cell(60,10,$publications,1,1,'C');
$pdf->Cell(60,10,'Awards: ',0,0);
$pdf->Cell(60,10,$awards,1,1,'C');
$pdf->Output();

?>

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
