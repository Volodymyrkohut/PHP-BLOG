


<?php

include("blocks/db.php");


if(isset($_POST['authorc'])){$authorc = $_POST['authorc'];}
if(isset($_POST['textc'])){$textc = $_POST['textc'];}
if(isset($_POST['pr'])){$pr = $_POST['pr'];}
if(isset($_POST['id'])){$id = $_POST['id'];}	#ід скритого поля , value from get!
if(isset($_POST['com'])){$com = $_POST['com'];} # Кнопка

if(isset($com)){ # була нажата кнопка!
	
	if(isset($authorc)){trim($authorc);}  # забирає пробели  з написаного!
	else{$authorc = "";}
if(isset($textc)){trim($textc);}
	else{$textc = "";}

# чи існує масив пост взагалі ,?
#################################################
echo "<pre>";
var_dump($_POST); 
echo "</pre>";
##################################################


if(empty($authorc) or empty($textc))

{
exit("Ви не ввели всю інформацію: <br> <input type='button' value='Повернутися назад' name='back' onclick='javascript:self.back();'>" );
}

# захист від слешів
$authorc = stripslashes($authorc);
$textc = stripslashes($textc);

#ігнорує коди HTML і 
$authorc = htmlspecialchars($authorc);
$textc = htmlspecialchars($textc);

#Витягуєм Суму з mysql
$suma = mysql_query("SELECT sum from comments_setting",$db);
$sumrow = mysql_fetch_array($suma);


#якщо сума з картинки дорівнює введеному чмслу
if($pr == $sumrow["sum"])
{
#формулюємо запрос!!
$date = date("Y-m-d"); 

$result = mysql_query("INSERT INTO comments (post,author,text,date) VALUES ('$id','$authorc','$textc','$date')",$db);

#відправляє лист на електронну адресу, який комент залишений і хто написав!
$address = "ares4321@mail.ru";
$subject = "Новий комент";
$result_WHERE = mysql_query("SELECT title FROM date WHERE id=$id",$db);
$myrow_WHERE = mysql_fetch_array($result_WHERE);
$post_title = $myrow_WHERE['title'];

$message = "появився коментарій до замітки - ".$post_title."\n Коменткар добавив(ла)".$authorc."\n текст коментарія ".$textc."
\n силлка на замітку http://localhost/phpblog/view_post.php?id=".$id."";
mail($address,$subject,$message);

#не відправляє на другу сторінку , а перезагружає цю!
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
</head></html>";
exit(); # і завершуємо всі остальні дії
}


else
{
exit("Ви ввели неправильно суму з картинки: <br> <input type='button' value='Повернутися назад' name='back' onclick='javascript:self.back();'>" );
}


}
?>