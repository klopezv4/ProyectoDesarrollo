<?php 
include('connection.php');
$FechaDeVisita = $_POST['FechaDeVisita'];
$NombredePaciente = $_POST['NombredePaciente'];
$MotivoDeVisita = $_POST['MotivoDeVisita'];
$MedicoTratante = $_POST['MedicoTratante'];
$ExamenesDeLab = $_POST['ExamenesDeLab'];
$Diagnostico = $_POST['Diagnostico'];
$MedicamentoAp = $_POST['MedicamentoAp'];
$Observaciones = $_POST['Observaciones'];

$sql = "INSERT INTO `visitas` (`FechaDeVisita`,`NombredePaciente`,`MotivoDeVisita`,`MedicoTratante`,`ExamenesDeLab`,`Diagnostico`,`MedicamentoAp`,`Observaciones`) 
values ('$FechaDeVisita','$NombredePaciente','$MotivoDeVisita','$MedicoTratante','$ExamenesDeLab','$Diagnostico','$MedicamentoAp','$Observaciones')";
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