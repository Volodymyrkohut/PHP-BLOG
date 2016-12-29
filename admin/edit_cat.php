<?php
include("blocks/db.php");
if(isset($_GET['id']))  {$id = $_GET['id'];}
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
              if(!isset($id)){
              $result = mysql_query("SELECT id,title FROM categories",$db);
              $myrow = mysql_fetch_array($result);

              do{
                  printf("<p><a href='edit_cat.php?id=%s'>%s</a></p><br>",$myrow['id'],$myrow['title']);
              }

              while($myrow = mysql_fetch_array($result));
              }


              






              else{

                $result = mysql_query("SELECT * FROM categories WHERE id='$id'",$db);
                $myrow = mysql_fetch_array($result);

print<<<HERE
<form action="update_cat.php" method="post" name="form">
                      
                      <br><label>Добавити назву категорії категорію <br>
                      <input type="text" name="title" size="25" value="$myrow[title]">
                   </label>

                    <br><br>

                  <label>добавити коротке описання - meta_d <br>
                      <input type="text" name="meta_d" size="25" value="$myrow[meta_d]">
                   </label>

                   <br><br>



                   <label>ключеві слова meta_k <br>
                      <input type="text" name="meta_k" size="25" value="$myrow[meta_k]">
                   </label>
                  <br><br>

                   <label>добавити короткий текст -  text <br>
                      <textarea cols="50" rows="20" name="text">$myrow[text]</textarea>
                   </label>

                   <input type="hidden" name="id" value="$myrow[id]">

                   <br>
                   <br>
                   
                   <input type="submit" name="submit" value="Редагувати" >
               </form>


HERE;
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