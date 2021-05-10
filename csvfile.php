<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['employee_details_file']['name'])
 {
  $filename = explode(".", $_FILES['employee_details_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['employee_details_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $employee_id = mysqli_real_escape_string($connect, $data[0]);  
                $employee_name = mysqli_real_escape_string($connect, $data[1]);
    $query = "
     UPDATE employee_details 
     SET employee_name = '$employee_name', 
     employee_password='$employee_password'
     WHERE employee_id = '$employee_id'
    ";
    mysqli_query($connect, $query);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">employee_details Updation Done</label>';
}

$query = "SELECT * FROM employee_details";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Update Mysql Database through Upload CSV File using PHP</title>
<script>
<src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
</script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script >
<src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Upload CSV File using PHP</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="employee_details_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">Deals of the Day</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Employee Name</th>
      <th>Employee Id</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["employee_name"].'</td>
       <td>'.$row["employee_id"].'</td>
	 <td>'.$row["employee_password"].'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
  </div>
 </body>
</html>
