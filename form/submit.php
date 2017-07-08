<?php 

$servername= "localhost";
$username="root";
$password="";
$dbname="test";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error)
{
	die("No network!" . $conn->connect_error);
}

$name=$_POST["name"];
$rollno=$_POST["rollno"];
$specialization=$_POST["specialization"];
$research=$_POST["research"];
$abstract=$_POST["abstract"];
$publications=$_POST["publications"];
$awards=$_POST["awards"];

$subtext1=$_POST["subtext1"];
$subtext2=$_POST["subtext2"];
$subtext3=$_POST["subtext3"];

    $errors= array();
    $file_name = $_FILES['image1']['name'];
    $file_size = $_FILES['image1']['size'];
    $file_tmp = $_FILES['image1']['tmp_name'];
    $file_type = $_FILES['image1']['type'];
//    $file_ext=strtolower(end(explode('.',$_FILES['image1']['name'])));

//    $expensions= array("jpg","jpeg","png");

//	if(in_array($file_ext,$expensions)=== false)
//	{
//		$errors[]="Given extension not allowed, please choose a JPG only";
//	}
//	if(empty($errors)==true)
//	{
		echo "Hello world";
		move_uploaded_file($file_tmp,"images/".$rollno."_1.".$file_ext);
		echo "image1 success!";
//	}else{
//		print_r($errors);
//	}
    $errors= array();
    $file_name = $_FILES['image2']['name'];
    $file_size = $_FILES['image2']['size'];
    $file_tmp = $_FILES['image2']['tmp_name'];
    $file_type = $_FILES['image2']['type'];
//    $file_ext=strtolower(end(explode('.',$_FILES['image2']['name'])));

//    $expensions= array("jpg","jpeg","png");

//	if(in_array($file_ext,$expensions)=== false)
//	{
//		$errors[]="Given extension not allowed, please choose a JPG only";
//	}
//	if(empty($errors)==true)
//	{
		move_uploaded_file($file_tmp,"images/".$rollno."_2.".$file_ext);
		echo "image2 success!";
//	}else{
//		print_r($errors);
//	}
    $errors= array();
    $file_name = $_FILES['image3']['name'];
    $file_size = $_FILES['image3']['size'];
    $file_tmp = $_FILES['image3']['tmp_name'];
    $file_type = $_FILES['image3']['type'];
//    $file_ext=strtolower(end(explode('.',$_FILES['image3']['name'])));

//   $expensions= array("jpg","jpeg","png");

//	if(in_array($file_ext,$expensions)=== false)
//	{
//		$errors[]="Given extension not allowed, please choose a JPG only";
//	}
//	if(empty($errors)==true)
//	{
		move_uploaded_file($file_tmp,"images/".$rollno."_3.".$file_ext);
		echo "image3 success!";
//	}else{
//		print_r($errors);
//	}

$sql = "INSERT INTO collection (name, rollno, specialization, research, abstract, publications, awards, subtext1, subtext2, subtext3) VALUES ('$name', '$rollno', '$specialization', '$research', '$abstract', '$publications', '$awards', '$subtext1', '$subtext2', '$subtext3')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: page.php?rollno=".$rollno);

?>

