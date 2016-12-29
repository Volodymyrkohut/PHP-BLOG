<td width="182" class="left">
	
	<div class="nav_title">Категорії</div>
<?php 
$result_left = mysql_query("SELECT * FROM categories",$db);
if(!$result_left)
{
echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
exit(mysql_error());
}

if(mysql_num_rows($result_left)>0)
{
$myrow_left = mysql_fetch_array($result_left);
}

else
{
echo "інформація по запросу не може бути витянута! В таблиці немає саписів!";
exit();
}

do
{
printf("<p><a href='view_cat.php?cat=%s' class='nav_categories'>%s</a></p><br>",$myrow_left['id'], $myrow_left['title']);
}
while($myrow_left = mysql_fetch_array($result_left));

?>
<br>






<!--Виводить 5 послідніх уроків!!!!!!!!!!!!!-->
<div class="nav_title">5 послідніх уроків</div>



<?php
$result_lessons = mysql_query("SELECT id,title FROM  date ORDER BY date DESC, id DESC LIMIT 5",$db);
# ORDER BY -сортувати по 
# DESC - з кінця
# LIMIT ліміт

if(!$result_lessons)
{
echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
exit(mysql_error());
}

if(mysql_num_rows($result_lessons)>0)
{
$myrow_lessons = mysql_fetch_array($result_lessons);

do 
{
	printf("<p><a href='view_post.php?id=%s' class='nav_categories'>%s</a></p><br>",$myrow_lessons['id'],$myrow_lessons['title']);
}



while($myrow_lessons = mysql_fetch_array($result_lessons));

}

else
{
echo "інформація по запросу не може бути витянута! В таблиці немає саписів!";
exit();
}

?>

<!--Архів!!!!!!-->
<div class="nav_title">Архів</div>
<?php
$result_date = mysql_query("SELECT DISTINCT left(date,7) AS month FROM date ORDER BY month DESC",$db); # вивести 7 перших символів , і дати значання AS month (создаємо перемінну)
#DISTINCT - виводить тільки 1  без повторень!
#ORDER BY - сортувати
#DESC наоборот
if(!$result_date)
{
echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
exit(mysql_error());
}

if(mysql_num_rows($result_date)>0)
{
$myrow_date = mysql_fetch_array($result_date);

do 
{
	printf("<p><a href='view_date.php?date=%s' class='nav_categories'>%s</a></p><br>",$myrow_date['month'],$myrow_date['month']);
}



while($myrow_date = mysql_fetch_array($result_date));

}




?>

<!--блоги друзів-->
<div class="nav_title">підтримка</div>
<?php

$result_friend = mysql_query("SELECT * FROM friend",$db);   


if(!$result_friend)
{
echo "<p>Запрос на відбірку даних  не може бути виконаний! Напишіть про це адміністратору <br> Код ошибки:</p>";
exit(mysql_error());
}



if(mysql_num_rows($result_friend)>0)
{

$myrow_friend = mysql_fetch_array($result_friend);






do
{
printf("<p><a href='%s' target='_blank' class='nav_categories'>%s</a></p><br>",$myrow_friend['link'],$myrow_friend['title']);
}
while($myrow_friend = mysql_fetch_array($result_friend));

}


?>




<div class="nav_title">Пошук</div>

<form action="view_search.php" name="forma" method="post">
	<label class='nav_categories'>Пошук </label><br>
	<input type="text" id="search" name="search" size="15" maxlength="40" placeholder="пошук" required>
	<input type="submit" name="go" value="go">
<br>
</form>
<br>
<br>


<!--Статистика-->
<div class="nav_title">Статистика</div>

<?php

$result_count_date = mysql_query("SELECT COUNT(*) FROM date",$db);
$myrow_count_date = mysql_fetch_array($result_count_date);


$result_count_comments = mysql_query("SELECT COUNT(*) FROM comments",$db);
$myrow_count_comments = mysql_fetch_array($result_count_comments);

echo "<p class='nav_categories' >В базі: <br>".$myrow_count_date[0]." - заміток <br>".$myrow_count_comments[0]." - Коментарів</p>";




?>












</td>