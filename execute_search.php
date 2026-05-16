<?php
include 'db_connect.php';
include 'functions.php';

$name=$_POST['search'];	
$query = "SELECT * FROM information where textdata='$name'";
$result = mysqli_query($con, $query);
?>

<br>
<br>
<br>

<center> 
<h2> SHOW ALL USERS <a href="Tour And Travel Touch.html"> HOME </a> - <a href="Tour And Travel Touch.html"> SEARCH ANOTHER USER</a></h2>
<table border ="1" cellspacing="0" cellpadding="10" height="25%" width="50%">
  <tr>
    <th>S.N.</th>
    <th>Where To</th>
    <th>How Many</th>
    <th>Arrival</th>
    <th>Leaving</th>
    <th>Text</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['id']; ?> </td>
   <td><?php echo $data['whereto']; ?> </td>
   <td><?php echo $data['howmany']; ?> </td>
   <td><?php echo $data['arrival']; ?> </td>
   <td><?php echo $data['leaving']; ?> </td>
   <td><?php echo $data['textdata']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
 </table

  </center>