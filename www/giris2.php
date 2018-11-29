<html>
<head>
<style type="text/css">
 body { background-color:#ccffcc;
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
$isim=$_POST['isim'];
$sifre=$_POST['sifre'];
$no='1';
$sql="select * from hesap";
$sonuc=$mysqli->query($sql);
session_start();
if ($sonuc->num_rows > 0) {
	echo "<br>";
	while($row = $sonuc->fetch_assoc()) {
		$a=$row['isim'];
		$b=$row['sifre'];
		$c=$row['id'];
		if($isim==$a){
			if($sifre==$b)
				{
				echo "<center>sifre dogru <br><br><br>";
				echo "mesaj sayfasına gönderiliyorsunuz</center>";
				$_SESSION['isim'] = $a;
				$_SESSION['sifre'] = $b;
				$_SESSION['id'] = $c;
				
				?> <meta http-equiv="refresh" content="5;url=mesaj.php">

					<?php
				}
			else  
				{
					?> <center> <?php
					echo "sifre yanlis";
					?></center> <center>	<br> <a href="giris.php"> Giris ekranı </a> </center> <?php
				
					
				}
		}			
		}
}
?>


</body>
</html>