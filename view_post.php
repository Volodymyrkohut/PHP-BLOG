<?php 
include("blocks/db.php");
if(isset($_GET['id'])){$id = $_GET['id'];}
if(!isset($id)){$id = 1;}

/*Провіряємо чи змінна являється числом! за допомогою регулярних виразів , для того щоб в строку не ввели запрос MYsql*/
if(!preg_match("|^[\d]+$|", $id)){
  exit("<p>Невірний формат запроса! Перевірте URL</p>");

}
#недозволяє прописувати в URL строці слова string



 $result = mysql_query("SELECT * FROM date WHERE id='$id'",$db);
              if(!$result){echo "Помилка -"; exit(mysql_error());}
              if(mysql_num_rows($result)>0){
              $myrow = mysql_fetch_array($result); 
              }
              else { echo "помилка! В таблиці немає записів!";}

// кількість переглядів!

$new_view = $myrow["view"]+1;
mysql_query("UPDATE date SET view='$new_view' WHERE id='$id'");


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta mame="description" content="<?php echo $myrow['meta_d'];?>">
    <meta mame="keywords" content="<?php echo $myrow['meta_k'];?>">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title><?php echo $myrow["title"]?></title>
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
               <?php $n=0; include("blocks/table.php");?>

              <?php 
                  

            

              printf("<p class='title_post' >%s</p>
                <br>
                <div class='text_text'>
                <p>%s</p>
                </div>
                <br>
                <div class='post'>
                <br>дата завантаження: %s
                <br>переглядів: %s
               <p>автор: %s </p>
               </div>


                ",$myrow['title'],$myrow['text'],$myrow['date'],$myrow['view'],$myrow['author']);
?>


<form name="radio_B" method="post" action="vote_res.php">
<p class="vote">Оценіть замітку:  1 <input type="radio" name="score" value="1">2 <input type="radio" name="score" value="2">3 <input type="radio" name="score" value="3">4<input type="radio" name="score" value="4">5<input type="radio" name="score" value="5" checked>
<input type="submit" name="submit_vote" value="Оцінити">
 </p> 
 <input name="id" type="hidden" value="<?php echo "$id" ?>" >


</form>








<?php



                $result_cs = mysql_query("SELECT img FROM comments_setting",$db);
                $myrow_cs = mysql_fetch_array($result_cs);
                ?>


              <form action="view_comments.php" method="post" name="form">
            <label>Введіть своє імя </label><br>
             <input type="text" name="authorc" id="authorc"><br>
              <label>текст</label><br>
              <textarea name="textc" cols="40" rows="6" ></textarea><br>
             
              
              <input type="hidden" name="id" value="<?php echo $id ?>">

               <br><p>Введіть суму з картинки</p>
               <p><img src="<?php echo $myrow_cs['img'];?>"> <input type="text" name="pr" id="pr" value="" size="5" maxlength="5"><br></p>
              <br>
              <input type="submit" value="добавити комент" name="com">
              <br>

              </form>
             




              <?php
              echo "<br><p class='e1'>Коментарі</p>";
              $result_comments = mysql_query("SELECT * FROM comments WHERE post = '$id'",$db);
              //провірка
             if(mysql_num_rows($result_comments)>0){
              $myrow_comments = mysql_fetch_array($result_comments);
              do{
               printf("<div class='comments'>
                      <p class='author_comments'>comment by: %s</p>
                      <br>
                      <p>%s</p>
                      <br>
                      <p>дата: %s</p>
                </div>
                <br>
                <br>
                ",$myrow_comments['author'],$myrow_comments['text'],$myrow_comments['date']);
                
              }
              while ($myrow_comments = mysql_fetch_array($result_comments));
                
              
              }
              else{echo "Коментарі відсутні";}


              ?>


            </td>
          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
