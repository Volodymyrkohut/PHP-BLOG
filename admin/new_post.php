

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta mame="description" content="<?php echo $myrow['meta_d'];?>">
    <meta mame="keywords" content="<?php echo $myrow['meta_k'];?>">
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
              <!-- content -->
              <form action="add_post.php" method="post" name="form">
             

             <!--Випадаючий список-->
            <select name="cat">
              <?php
              include("blocks/db.php");
              $result_for_select = mysql_query("SELECT id, title FROM categories",$db);
              $myrow_for_select = mysql_fetch_array($result_for_select);
              do{
                printf("<option value='%s'>%s</option>",$myrow_for_select['id'],$myrow_for_select['title']);
              }

              while($myrow_for_select = mysql_fetch_array($result_for_select));
              ?>

             
            </select>

            <br>
               

                <label>Title <br>
                <input type="text" name="title" size="25">
              </label><br>

              <label>Вкажіть коротке описання <br>
                <input type="text" name="meta_d" size="25">
              </label><br>

              <label>Вкажіть Ключеві слова <br>
                <input type="text" name="meta_k" size="25">
              </label><br>

              <label>Короткий текст <br>
                <textarea name="description" cols="10" ></textarea>
              </label><br>
              
                <label>Текст<br>
                <textarea name="text" cols="10" ></textarea>
              </label><br>


              <label>Вкажіть Автора <br>
                <input type="text" name="author" size="25">
              </label><br>

              <label>Вкажіть дату <br>
                <input type="date" name="date" size="25">
              </label><br>

                <label>загрузити картинку <br>
                <input type="text" name="miniimg" size="25">
              </label><br>

           

                <input type="submit" name="submit" value="Добавити" >



              </form>
           
          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
