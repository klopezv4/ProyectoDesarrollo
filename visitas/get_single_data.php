<?php include('visitas/connection.php');
$id = $_POST['id'];
$sql = "SELECT * FROM visitas WHERE id='$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
