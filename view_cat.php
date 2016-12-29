<?php
 include("blocks/db.php");
if(isset($_GET['cat'])){$cat= $_GET['cat'];}
if(!isset($cat)){ $cat=1;}

/*Провіряємо чи змінна являється числом! за допомогою регулярних виразів , для того щоб в строку не ввели запрос MYsql*/
if(!preg_match("|^[\d]+$|", $cat)){
  exit("<p>Невірний формат запроса! Перевірте URL</p>");

}
#недозволяє прописувати в URL строці слова string


$result = mysql_query("SELECT * FROM categories WHERE id='$cat'",$db);

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
		<title><?php  echo "розмітки ".$myrow["title"]; ?></title>
	</head>
<body>
  <table id="table1" width="690">
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
              <?php echo $myrow["text"];

             
              ######              НАВІГАЦІЙНА ПАНЕЛЬ СТОРІНОК
              ######
              ######
$result77 = mysql_query("SELECT str FROM options", $db);
$myrow77 = mysql_fetch_array($result77);
$num = $myrow77["str"];
// Извлекаем из URL текущую страницу
@$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$result00 = mysql_query("SELECT COUNT(*) FROM date WHERE cat='$cat'",$db);
$temp = mysql_fetch_array($result00);
$posts = $temp[0];  // допустимо 9 елементів 

// Находим общее число страниц
$total = (($posts - 1) / $num) + 1; // послідня сторінка
$total =  intval($total);   //                          заокруглює число!
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;// Формула яка рахує з якого уроку показувати! (на 2 сторінці з 4, на 3 сторінці з 8, на 4 сторінці з 12)
// Выбираем $num сообщений начиная с номера $start
              ######
              ######
              ######ORDER BY id LIMIT $start, $num  дописується в $result


              $result = mysql_query("SELECT id, title,description,date,author,view,miniimg,rating,q_vote FROM date WHERE cat='$cat' ORDER BY id LIMIT $start, $num",$db);     // LIMIT  з якої по яку замітку витягувати
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

                printf("<div class='all_date'><p><a  class='href' href='view_post.php?id=%s'>%s</a><p><br>
                        <div><img src='%s' class='img_data'></div>
                       
                        <p class='text_data'>%s<p>
                        <br>
                        <br>
                        <div class='author'>автор: %s</div>
                        <div class='date'>дата: %s</div>
                        <br>
                        </div>
                        <div class='view'>Переглядів: %s   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; рейтинг: <img src='images/star/%s.png'></div>
                        <br>
                        <br>
                        <br>

                  ",$myrow['id'],$myrow['title'], $myrow['miniimg'],$myrow['description'], $myrow['author'],$myrow['date'],$myrow['view'],$r);
              }


              while($myrow = mysql_fetch_array($result));




              #####
              #####         НАВІГАЦІЙНА ПАНЕЛЬ СТОРІНОК
              #####

// якщо в нас не перша сторінка , то ми виводимо на екран першу сторінку  і попередню, і так само виводимо наступну і  останню 
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href=view_cat.php?cat='.$cat.'&page=1>Первая</a> | <a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>Следующая</a> | <a href=view_cat.php?cat='.$cat.'&page=' .$total. '>Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);  // невиводить ошибки , навіть якщо вони є! 
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}



              #####
              #####
              #####













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
