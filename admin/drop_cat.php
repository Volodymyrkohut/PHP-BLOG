<?php
include("blocks/db.php");
if(isset($_POST['id'])){ $id=$_POST['id'];}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Кабінет адміністратора</title>
	</head>
<body>
  <table id="table1">
  		<?php include("blocks/header.php"); ?>

	
  	<tr>
  	   <td>
  	   
       <table id="table2" >
          <tr>
            <? include("blocks/left.php"); ?>
             <td width="508" id="content">
             

              <?php

if(isset($id)){
               $result0 = mysql_query("SELECT id FROM date WHERE cat='$id'",$db); # якщо існує в татегорії замітки 
               if(mysql_num_rows($result0) > 0)
               {
                echo "Ви не можете удалити категорію , по причині що вона не пуста!";
               }

      else{
             $result = mysql_query("DELETE FROM categories WHERE id='$id'",$db);
             if($result == "true"){ echo "Категорія була успішно видалена";}
              else { echo "Категорія не була видалена ";}
              }

}

            else
            {
              echo "ви не вибрали категорію яку бажаєте видалити!";
            }


              ?>










          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>