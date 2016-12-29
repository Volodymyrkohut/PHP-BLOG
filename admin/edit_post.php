<?php
  include("blocks/db.php");
  if(isset($_GET['id']))   { $id = $_GET['id'];}
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
       
       <table id="table2">
          <tr>
            <? include("blocks/left.php"); ?>
             <td width="508" id="content">
              <!-- content -->
                <?php

               
                if(!isset($id)){
               
                $result = mysql_query("SELECT title, id FROM date",$db);
                $myrow = mysql_fetch_array($result);
                do{
                  printf("<p><a href='edit_post.php?id=%s'>%s</a></p> <br>",$myrow['id'],$myrow['title']);
                }

                while($myrow = mysql_fetch_array($result));

              }
              



else{
         
                $result =  mysql_query("SELECT * FROM date WHERE id='$id'",$db);
                $myrow = mysql_fetch_array($result);
                
                $result_for_select = mysql_query('SELECT id, title FROM categories',$db);
              $myrow_for_select = mysql_fetch_array($result_for_select);

# якщо категорія і ід співпадають то selected
echo "<p align='center'>Редагувати примітку</p>";


echo " 
            <form action='update_post.php' method='post' name='form'>
            <p>Виберіть категорію<br><select name='cat'>";

              
              do{

                
                if($myrow['cat'] == $myrow_for_select['id'])
                {
                  printf("<option value='%s' selected>%s</option>",$myrow_for_select['id'],$myrow_for_select['title']);
                }


                else
                {
                  printf("<option value='%s'>%s</option>",$myrow_for_select['id'],$myrow_for_select['title']);
                }

              }

              while($myrow_for_select = mysql_fetch_array($result_for_select));
              

             
             echo "</select></p>";

            


print<<<HERE

              
 
               

                <label>Title <br>
                <input type="text" name="title" size="25" value="$myrow[title]">
              </label><br>

              <label>Вкажіть коротке описання <br>
                <input type="text" name="meta_d" size="25" value="$myrow[meta_d]"">
              </label><br>

              <label>Вкажіть Ключеві слова <br>
                <input type="text" name="meta_k" size="25" value="$myrow[meta_k]">
              </label><br>

              <label>Короткий текст <br>
                <textarea name="description" cols="40" rows="5" >$myrow[description]</textarea>
              </label><br>
              
                <label>Текст<br>
                <textarea name="text" cols="60" rows="15" >$myrow[text]</textarea>
              </label><br>


              <label>Вкажіть Автора <br>
                <input type="text" name="author" size="25" value="$myrow[author]">
              </label><br>

              <label>Вкажіть дату <br>
                <input type="date" name="date" size="25" value="$myrow[date]">
              </label><br>

                <label>загрузити картинку <br>
                <input type="text" name="miniimg" size="25" value="$myrow[miniimg]">
              </label><br>
                  <input type="hidden" value="$myrow[id]" name="id">

                <input type="submit" name="submit" value="Відредагувати" >



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