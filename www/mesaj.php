<html>
<head>
<style type="text/css">
 body { background-color:#ccffcc;
 }
 select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
}
input[type=submit]{
	background-color: #3CBC8D;
	cursor: pointer;
	padding: 8px 8px;
	border-radius:50%;
}
 </style>
</head>
<body>
<?php
$server="localhost";
$database="php";
$username="root";
$password="";
$mysqli=mysqli_connect('localhost:3306','root','','php');
session_start();
$isim = $_SESSION['isim'];
$sifre = $_SESSION['sifre'];
$id = $_SESSION['id'];
$sql="select isim from hesap";
$sonuc=$mysqli->query($sql);
if ($sonuc->num_rows > 0) {
	?>
	<form action="mesaj2.php" method="post">
	<select name="kisi"> <?php
	while($row = $sonuc->fetch_assoc()) {
		?>
		<option> <?php echo $row['isim']; ?> </option> <?php
}
 ?>
 </select>
 <br> <br> <br> <br> <br>
<center>  <input type="submit" name="Submitt"/> </center>
	</form><?php	
}
?>
</body>
</html>
        <?php    
if(isset($_POST['Submitt'])){
  $input = $_POST['kisi'];
  $_SESSION['alcak']=$input;
  echo $input;
}    
?>