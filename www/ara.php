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
$sql="select * from hesap";
$sonuc=$mysqli->query($sql);
if ($sonuc->num_rows > 0) {
	echo "Sonuclar";
	echo "<br>";
	while($row = $sonuc->fetch_assoc()) {
		echo "isim: " . $row["isim"]. " Sifre:" . $row["sifre"] . "<br>";
		}
}
?>
</body>
</html>