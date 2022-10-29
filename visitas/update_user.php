<?php 
include('connection.php');
$FechaDeVisita = $_POST['FechaDeVisita'];
$MotivoDeVisita = $_POST['MotivoDeVisita'];
$MedicoTratante = $_POST['MedicoTratante'];
$ExamenesDeLab = $_POST['ExamenesDeLab'];
$Diagnostico = $_POST['Diagnostico'];
$MedicamentoAp = $_POST['MedicamentoAp'];
$Observaciones = $_POST['Observaciones'];
$id = $_POST['id'];

$sql = "UPDATE `visitas` SET  `FechaDeVisita`='$FechaDeVisita' , `MotivoDeVisita`= '$MotivoDeVisita', `MedicoTratante`='$MedicoTratante', `Diagnostico `='$Diagnostico', `MedicamentoAp `='$MedicamentoAp', `Observaciones `='$Observaciones' WHERE id='$id' ";
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