<html>
<head>
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
	<select name="kişi"> <?php
	while($row = $sonuc->fetch_assoc()) {
		?>
		<option> <?php echo $row['isim']; ?> </option> <?php
}
 ?>
 </select>
  <input type="submit"  value="giriş" />
	</form><?php	
}
?>
</body>
</html>