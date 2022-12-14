<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM visitas ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'FechaDeVisita',
	2 => 'NombredePaciente',
	3 => 'MotivoDeVisita',
	4 => 'MedicoTratante',
	5 => 'ExamenesDeLab',
	6 => 'Diagnostico',
	7 => 'MedicamentoAp',
	8 => 'Observaciones',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE FechaDeVisita like '%".$search_value."%'";
	$sql .= " OR NombredePaciente like '%".$search_value."%'";
	$sql .= " OR MotivoDeVisita like '%".$search_value."%'";
	$sql .= " OR MedicoTratante like '%".$search_value."%'";
	$sql .= " OR ExamenesDeLab like '%".$search_value."%'";
	$sql .= " OR Diagnostico like '%".$search_value."%'";
	$sql .= " OR MedicamentoAp like '%".$search_value."%'";
	$sql .= " OR Observaciones like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['FechaDeVisita'];
	$sub_array[] = $row['NombredePaciente'];
	$sub_array[] = $row['MotivoDeVisita'];
	$sub_array[] = $row['MedicoTratante'];
	$sub_array[] = $row['ExamenesDeLab'];
	$sub_array[] = $row['Diagnostico'];
	$sub_array[] = $row['MedicamentoAp'];
	$sub_array[] = $row['Observaciones'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Editar</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Borrar</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>  $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
