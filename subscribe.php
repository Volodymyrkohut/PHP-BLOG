<?php
 include("blocks/db.php");
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='subscribe'",$db);
if(!$result){
  echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
 exit(mysql_error());  //Виводить помилку (яка іменно помилка!);
}
if(mysql_num_rows($result)>0){   //якщо заповнена хоча б одне поле в табличці і воно більше 0
$myrow = mysql_fetch_array($result);
}
else{
  echo "інформація по запросу не може бути витянута! В таблиці немає саписів!";
  exit();
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta mame="description" content="<?php echo $myrow['meta_d'];?>">
    <meta mame="keywords" content="<?php echo $myrow['meta_k'];?>">
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
            <? include("blocks/left.php"); ?>
           
            <td width="508" id="content">
              <!-- content -->
              <?php $n=2; include("blocks/table.php");?>
              <?php echo $myrow["text"] ?>

            </td>
          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
