<?php
 include("blocks/db.php"); 
 $login = $_COOKIE['login'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title> Кімната користувача</title>
  </head>
<body>
  <table id="table1">
 <?php include("blocks/register.php");?>
      <?php include("blocks/header.php"); ?>
    <tr>
<td>
       <table id="table2">
          <tr>
            <?php include("blocks/left.php");?>
           
            <td width="508" id="content"><!-- content -->
           <?php $n=0; include("blocks/table.php");?>
              

              <?php if(isset($_COOKIE['login']))
              {
                echo "куки існують<br>";
                include("blocks/db.php");
                $result = mysql_query("SELECT * FROM register WHERE login='$login'",$db);
                $myrow = mysql_fetch_array($result);

                 echo "Ваш логін: ".$myrow['login']."<br>";
                 echo "Ваш e_mail: ".$myrow['e_mail'];
                  
                 
              }
              else
              {
                echo "Для того щоб побачити дане вам необхідно зайти в акаунт";
              }

              ?>
              

              <!-- Загружаємо файл на сервер!-->
              <form action="user_room.php" name="f" method="post" enctype="multipart/form-data">
                <input type="file" name="ava" size="9" required>
                <input type="submit" name="sub"  value="загрузити">
              </form>
              
              <?php
             
              
                $name= $_FILES['ava']['name'];
                $f = $_FILES['ava']['tmp_name'];
                move_uploaded_file($_FILES['ava']['tmp_name'], "./ava/".$_FILES["ava"]["name"]);
                $v = "./ava/".$_FILES["ava"]["name"];
               
               
                echo "<img src='$v'>";
                if($_POST['sub']){
                $resu = mysql_query("INSERT INTO register (ava) VALUES ('$v') WHERE login='$login'",$db);
                if(!$resu){ echo "Помилка";}
                }
                else{ echo " evrithing ok";}
                
              ?>
















            </td>
          </tr>
       </table>
</td>

      <?php include("blocks/footer.php");?>

  </table>
</body>
</html>
