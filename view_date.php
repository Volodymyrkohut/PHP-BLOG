<?php
 include("blocks/db.php");

if(isset($_GET['date'])){$date = $_GET['date'];}

  else
  {
exit("<p>помилка</p>");
  }


//В голові
  //  $date_begin = 2016-01!  date_end = 2016-02;

$date_title = $date;  // for title

$date_begin = $date;


$date++;
$date_end = $date;

$date_begin = $date_begin."-1";
$date_end = $date_end."-1";


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta mame="description" content="<?php echo $myrow['meta_d'];?>">
    <meta mame="keywords" content="<?php echo $myrow['meta_k'];?>">
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title><?php  echo $date_title ?></title>
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
              
              $result = mysql_query("SELECT id, title,description,date,author,view,miniimg,rating,q_vote FROM date WHERE  date>'$date_begin' AND date<'$date_end'",$db);
              if(!$result){
                echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
              exit(mysql_error());
              }
              if(mysql_num_rows($result)>0){
              $myrow = mysql_fetch_array($result);
              }
              else { echo "інформація по запросу не може бути витянута! В таблиці немає саписів!";
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
