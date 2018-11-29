<html>
<head>
<style type="text/css">
 body { background-color:#ccffcc;
 }
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
if ($sonuc->num_rows > 0) {
	while($row = $sonuc->fetch_assoc()) {
		if($row['isim']==$isim){
			echo "ayni isimde biri var başka bir isim deneyin";
			goto a;
		}
		$row2=$row['id'];
		$row['id']=$row['id']+1;
		$row3=$row['id'];
		echo "isim: " . $row["isim"]. " Sifre:" . $row["sifre"] . "Id: " . $row["id"] ."<br>";
		$sql="update hesap set id='".$row3."' where id='".$row2."'";
		$mysqli->query($sql);
		}
}
$sql="insert into hesap (isim,sifre,id) values" .
                 "('".$isim."','".$sifre."','".$no."')"; 
$mysqli->query($sql);
a:
?>
</body>
</html>