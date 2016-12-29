
<?php include('blocks/db.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title><?php echo $myrow["title"]; ?></title>
	</head>
<body>
  <table id="table1">
 <?php include("blocks/register.php");?>
  		<?php include("blocks/header.php"); ?>

	 
  	<tr>

<td>
  	   
       <table id="table2">
          <tr>
            <? include("blocks/left.php");?>
           
            <td width="508" id="content"><!-- content -->
           <?php $n=1; include("blocks/table.php");?>
              
           <?php
           include("blocks/db.php");

            if(isset($_POST['r_submit'])){



            if(isset($_POST['login'])) {$login = $_POST['login'];}
            if(isset($_POST['password'])) {$password = $_POST['password'];}
             if(isset($_POST['e_mail'])) {$e_mail = $_POST['e_mail'];}
             if(isset($_POST['r_password'])) {$r_password = $_POST['r_password'];}
             
            if($password == $r_password){  
             $password = md5($password);   // Генерею пароль для незламності!
            

            $result = mysql_query("INSERT INTO register (login,password,e_mail) VALUES ('$login','$password','$e_mail')",$db);
            if($result == "true"){
              echo "<p class='right'>Реєстрація пройшла успішно</p>";
            }
            else { echo "<p class='wrong'>Невдалося зареєструвати</p>";}
              }
              else{echo "<p class='wrong'>паролі не збігаються</p>";}
           


           }

           ?>



      <form action="for_register.php" method="post" name="form">
          <p>Реєстрація</p>
           <label> 
            Введіть свій логін:<br>
              <input type="text" name="login" placeholder="Логін" required>
            </label><br><br>

            <label> 
            Введіть свій пароль:<br>
              <input type="password" name="password" placeholder="Пароль" required>
            </label>
            <br><br>

            <label>
            Повторіть свій пароль:<br>
              <input type="password" name="r_password" placeholder="Пароль" required>
            </label>
            <br><br>


            <label> 
            Введіть свій e-mail:<br>
              <input type="text" name="e_mail" placeholder="e-mail" required>
            </label><br><br>

            <input type="submit" name="r_submit" value="Зареєструватися">
        


      </form>
































            </td>
          </tr>
       </table>
  		


</td>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
