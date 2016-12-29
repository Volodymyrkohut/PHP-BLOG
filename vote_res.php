<?php
include("blocks/db.php");
if(isset($_POST['score'])){ $score = $_POST['score'];}
if(isset($_POST['id'])){ $id = $_POST['id'];}

$result = mysql_query("SELECT q_vote,rating FROM date WHERE id='$id'",$db);

 if(!$result){echo "Помилка -"; exit(mysql_error());}
              if(mysql_num_rows($result)>0){
              $myrow = mysql_fetch_array($result); 
              
              $new_rating = $myrow['rating'] + $score; // стара кількість оцінок + новий голос!
              $new_q_vote = $myrow['q_vote'] + 1; // Кількість старих проголосувавших + 1! цей!

              // І обновляємо це все! 
              $update = mysql_query("UPDATE date SET q_vote='$new_q_vote',rating='$new_rating' WHERE id='$id'",$db);

              if($update){
#не відправляє на другу сторінку , а перезагружає цю!
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
</head></html>";
exit(); # і завершуємо всі остальні дії
              }


              }
              else { echo "помилка! В таблиці немає записів!";}

?>