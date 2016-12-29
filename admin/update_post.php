<?php
  include("blocks/db.php");
  #if(isset($_GET['id']))   { $id = $_GET['id'];}
?>

<!DOCTYPE html>
<?php
if(isset($_POST['title'])) {$title = $_POST['title'];                       if($title == ''){unset($title);}}
if(isset($_POST['meta_d'])) {$meta_d = $_POST['meta_d'];                   if($meta_d == ''){unset($meta_d);}}
if(isset($_POST['meta_k'])) {$meta_k = $_POST['meta_k'];                   if($meta_k == ''){unset($meta_k);}}
if(isset($_POST['description'])) {$description = $_POST['description'];    if($description == ''){unset($description);}}
if(isset($_POST['text'])) {$text = $_POST['text'];                         if($text == ''){unset($text);}}
if(isset($_POST['date'])) {$date = $_POST['date'];                         if($date == ''){unset($date);}}
if(isset($_POST['author'])) {$author = $_POST['author'];                   if($author == ''){unset($author);}}
if(isset($_POST['miniimg'])) {$miniimg = $_POST['miniimg'];                if($miniimg == ''){unset($miniimg);}  }
if(isset($_POST['cat'])) {$cat = $_POST['cat'];                if($cat == ''){unset($cat);}  }


if(isset($_POST['id'])) {$id = $_POST['id'];}                                
?>

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
                  if(isset($title) && isset($cat) && isset($meta_d) && isset($meta_k) && isset($description) && isset($date) && isset($text) && isset($author) && isset($miniimg))
{
                  $result_update = mysql_query("UPDATE date SET cat='$cat', title='$title', meta_d='$meta_d', meta_k='$meta_k', description='$description', text='$text', date='$date', miniimg='$miniimg', author='$author' WHERE id='$id'",$db);
                  
                  if($result_update == "true"){
                    echo "відредаговано успішно";
                  }

                  else{
                    echo "error";
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