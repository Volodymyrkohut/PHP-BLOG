<?php
include("blocks/db.php");
if(isset($_POST['title']))   {$title = $_POST['title'];                        if($title == ''){unset($title);}}      
if(isset($_POST['meta_d']))   {$meta_d = $_POST['meta_d'];                     if($meta_d == ''){unset($meta_d);}}
if(isset($_POST['meta_k']))   {$meta_k = $_POST['meta_k'];                     if($meta_k == ''){unset($meta_k);}}
if(isset($_POST['text']))   {$text = $_POST['text'];                           if($text == ''){unset($text);}}
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
               if(isset($title) && isset($meta_d) && isset($meta_k) &&  isset($text)){
                $result = mysql_query("INSERT INTO categories (title,meta_d,meta_k,text) VALUES ('$title','$meta_d','$meta_k','$text')",$db);
                if($result == "true"){ echo "Категорія була успішно добавлена";}
                else{ echo "невідправлено , помилка в запросі SQL";}
}
               
                else{echo "Невдалося добавити, ви не заповнили всі строки!";}

             ?>










          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
