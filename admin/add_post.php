<?php
include("blocks/db.php");
if(isset($_POST['title']))  {$title = $_POST['title'];                      if($title == ''){unset($title);}}
if(isset($_POST['meta_d']))  {$meta_d = $_POST['meta_d'];                   if($meta_d == ''){unset($meta_d);}}
if(isset($_POST['meta_k']))  {$meta_k = $_POST['meta_k'];                   if($meta_k == ''){unset($meta_k);} }
if(isset($_POST['description']))  {$description = $_POST['description'];    if($description == ''){unset($description);} }
if(isset($_POST['text']))  {$text = $_POST['text'];                         if($text == ''){unset($text);}}
if(isset($_POST['date']))  {$date = $_POST['date'];                         if($date == ''){unset($date);}}
if(isset($_POST['author']))  {$author = $_POST['author'];                   if($author == ''){unset($author);}} 
if(isset($_POST['cat']))  {$cat = $_POST['cat'];                           if($cat == ''){unset($cat);}}                   // Категорія  
if(isset($_POST['miniimg']))  {$miniimg = $_POST['miniimg'];               if($miniimg == ''){unset($miniimg);}}           // Картинка

 
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

<!--НАПИСАНО БЕЗ ПРОВІРОК-->

<?php
if(isset($title) && isset($miniimg) && isset($cat) && isset($meta_d) && isset($meta_k) && isset($description) && isset($date) && isset($text) && isset($author))
{


  $result = mysql_query("INSERT INTO date (meta_d, meta_k, date,text,description,title,author,cat,miniimg) VALUES ('$meta_d', '$meta_k', '$date','$text','$description','$title','$author','$cat','$miniimg')");
    if ($result == "true"){
      echo "Успішно добавлено";
 }
else{
echo  "Невідправлено по невідомій причині!";
}

}


else{
  echo "Ви неввели всі дані! Будь-ласка повторіть відправку і впевніться що всі поля були заповнені";
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