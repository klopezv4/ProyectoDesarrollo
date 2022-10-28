<?php 
include('connection.php');
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$especialidad = $_POST['especialidad'];
$id = $_POST['id'];

$sql = "UPDATE `medicos` SET  `nombre`='$nombre' , `telefono`= '$telefono', `especialidad`='$especialidad' WHERE id='$id' ";
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