<?php 
include('connection.php');
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$especialidad = $_POST['especialidad'];

$sql = "INSERT INTO `medicos` (`nombre`,`telefono`,`especialidad`) values ('$nombre', '$telefono', '$especialidad')";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>