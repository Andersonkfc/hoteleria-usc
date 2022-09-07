<?php
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $mysqli = new mysqli($dbhost,$dbuser,$dbpass,"bdhoteleria");
 $result;
 if(isset($_POST['parametro']))
 {
 $parametro=trim($_POST['parametro']);
 if($parametro!="")
 {
 $result = $mysqli->query("SELECT * FROM tipo_habitacion WHERE id_tipo_habitacion;");
 $resultados = array();
 while ($row_errs = $result->fetch_array()) 
 { 
 $resultados[]= $row_errs; 
 }
 ?>
 <table align="center" border="1" id="grilla">
 <tr align='center'>
 <th>Id</th>
 <th>Cedula</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Fecha</th>
 <th>Foto</th>
 <th>Imprimir</th>
 </tr>
 <?php
 foreach($resultados as $post):
 ?>
 <tr>
 <td>
 <?php echo $post['tesId']; ?>
 </td>
 <td>
 <?php echo $post['testCedula']; ?>
 </td>
 <td>
 <?php echo $post['testNombre']; ?>
 </td>
 <td>
 <?php echo $post['testApellido']; ?>
 </td>
 <td>
 <?php echo $post['testFecNacido']; ?>
 </td>
 <td>
 <?php echo $post['imagen'];?> 
 </td>
 <td>
<?php echo"<input type='button' value='Ver' class='button' onclick='tomaIds()'data-type='zoomin'/>"; ?>
 </td>
 </tr>
 <?php
 endforeach;
 ?>
 </table>
 <?php
 }
 }
?>
 