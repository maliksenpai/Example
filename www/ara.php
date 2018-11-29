<!DOCTYPE HTML>
        <?php    
if(isset($_POST['Submitt'])){
  $input = $_POST['fname'];
  $message = "Success! You entered: ".$input;
  echo $message;
}    
?>

<html>
<head>
</head>
<body>    
<form action="" method="post">
  <input type="text" name="fname"/>
  <input type="submit" name="Submitt"/>
</form>    
    </body>
</html>  