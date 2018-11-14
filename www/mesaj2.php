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
$durum="0";
$durum2="1";
$sql="select * from hesap";
$sonuc=$mysqli->query($sql);
$kime=$_POST['kişi'];
$kime2=$kime;
if ($sonuc->num_rows > 0) {
	while($row = $sonuc->fetch_assoc()) {
		$a=$row['isim'];
		$b=$row['id'];
		if($a==$kime2){
			$alanid=$b;
		}
		
	}
}
	$sql="select * from mesaj" ;
	$sonuc=$mysqli->query($sql);
	if ($sonuc->num_rows > 0) {
	while($row = $sonuc->fetch_assoc()) {
		if ($row['alanid']==$id){
		if($row['durum']=="0"){
		$d=$row['mesaj'];
		echo $d;
		$sql="update mesaj set durum='".$durum2."' where alanid='".$id."' and durum='".$durum."'";
		$mysqli->query($sql);
		}
		}
		?> <br> <br> <br> <br> <?php
	}
	?>
	<form action="" method="post">
	<input type="text" name="mesaj2" value="<?PHP if(isset($mesaj3)){ print $mesaj3; 
	$sql="insert into mesaj (verenid,verenisim,mesaj,alanid,durum) values ('".$id."','".$isim."','".$mesaj3."','".$alanid."','".$durum."'";
	$mysqli->query($sql);
	} ?>">
	<input type="submit">
	</form>
	<?php
	
	
	
	}
?>
</body>
</html>