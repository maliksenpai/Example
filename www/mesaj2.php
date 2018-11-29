
<html>
<head>
<style type="text/css">
 body { background-color:#ccffcc;
 }
 input[type=submit]{
	background-color: #3CBC8D;
	cursor: pointer;
	padding: 8px 8px;
	border-radius:50%;
}
input[type=text] {
    color: #3CBC8D;
	width: 95%;
}

h5{
	border-bottom: 10px solid #3CBC8D;
	background-color: #F0F8FF;
	width:100%;
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
$durum="0";
$durum2="1";
$sql="select * from hesap";
$sonuc=$mysqli->query($sql);
$kime=$_SESSION['alcak'];
$kime2=$kime;
if ($sonuc->num_rows > 0) {
	header('Refresh: 6; url=mesaj2.php');
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
		$d=$row['mesaj'];
		?> <h5> <?php
		echo $d." (&)";
		?> </h5> <?php
		if($row['durum']=="0"){
		$d=$row['mesaj'];
		?> <h5> <?php
		echo $d;
		?> </h5> <?php
		$sql="update mesaj set durum='".$durum2."' where alanid='".$id."' and durum='".$durum."'";
		$mysqli->query($sql);
		}
		}
	}}
	
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['inputText']; //get input text
		$sql="insert into mesaj (verenid,verenisim,mesaj,alanid,durum) values" . 
		 "('".$id."','".$isim."','".$input."','".$alanid."','".$durum."')";
			$k=$input;
			
		
		$mysqli->query($sql);
	}
	$sql="select * from mesaj" ;
	$sonuc=$mysqli->query($sql);
	if ($sonuc->num_rows > 0) {
	while($row = $sonuc->fetch_assoc()) {
		$a1=$row['verenisim'];
		$a2=$row['alanid'];
		if($a1==$isim){
			if($a2==$alanid){
				$k=$row['mesaj'];
				if($row['durum']=="0"){
					?> <h5> <p align="right"><?php
					echo $k;
					?> </h5>  </p><?php
				}
				else{
					?> <h5> <p align="right"><?php
					echo $k."(&)";
					?> </h5>  </p><?php
				}
	}}}}
?>
	 <br><br><br><br><br><br><br><br><br><br><br>
	<form action="" method="post"> <div class=\"gelis\">
	<input type="text" name="inputText"/>
  <input type="submit" name="SubmitButton" value="-->" />
  </div>
</form>  
</body>
</html>
