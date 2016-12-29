<?php
 include("blocks/db.php");
if(isset($_POST['search'])){ $search = $_POST['search'];}
if(isset($_POST['go'])){$go = $_POST['go'];}

if(isset($go)) # якщо була нажата кнопка то..... !!! 
{

if(empty($search) or strlen($search)<4){  # якщо сірч пустий , або має менше 4 символів
exit("<p>пошуковий запрос не введений або він має менше чотирьох символів</p>");
$search = trim($search); #забирає пропуски ! 
$search = stripslashes($search); # слешує різні кавички то що! ( для захисту!)
$search = htmlspecialchars($search); # якщо є вписані якісь скріпти!
}





}




else
{
exit("<p>помилка пошуку!</p>");
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
		<title><?php echo  "замітки по запросу".$search ?></title>
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
        <?php $n=7; include("blocks/table.php");?>
              <?php 
              # it's work
              # Проблема вирішена!!!
              # потрібно було обрати інакший тип таблиці!
              #  innoDB на MyISAM
              # шукає подібне MATCH(text)  AGAINST('*$search**nam*' IN BOOLEAN MODE)
              #Кращий спосіб Але не получилося! - MATCH(text) AGAINST('$search') 
              #Способи пошуку WHERE  text  LIKE '%$search%' (де текст як %змінна інпута пост%)
             
              $result = mysql_query("SELECT id, title,description,date,author,view,miniimg,rating,q_vote  FROM  date WHERE  MATCH(text)  AGAINST('*$search**nam*' IN BOOLEAN MODE) ",$db); # де найдений збіг text.у з полем вводу(пошуку!)
              if(!$result){
                echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
              exit(mysql_error());
              }
              if(mysql_num_rows($result)>0){
              $myrow = mysql_fetch_array($result);
              }
              else { echo "Нічого не знацдено по вашому запросу";
              exit();
            }

              do
              {

                ###
                ### для рейтинку нукаємо середнє арефметичне
                $r = $myrow["rating"]/ $myrow["q_vote"]; // знаходимо середнє арефметичне
                $r=intval($r);  // округляємо число
                ###
                ###


                printf("<div class='all_date'><p><a  class='href'href='view_post.php?id=%s'>%s</a><p><br>
                        <div><img src='%s' class='img_data'></div>
                       
                        <p class='text_data'>%s<p>
                        <br>
                        <br>
                        <div class='author'>автор: %s</div>
                        <div class='date'>дата: %s</div>
                        <br>
                        </div>
                        <div class='view'>Переглядів: %s  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; рейтинг: <img src='images/star/%s.png'></div>
                        <br>
                        <br>
                        <br>

                  ",$myrow['id'],$myrow['title'], $myrow['miniimg'],$myrow['description'], $myrow['author'],$myrow['date'],$myrow['view'],$r);
              }


              while($myrow = mysql_fetch_array($result));




















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
