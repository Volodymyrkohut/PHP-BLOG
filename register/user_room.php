<?php
 include("blocks/db.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title> Кімната користувача</title>
  </head>
<body>
  <table id="table1">
 <?php include("blocks/register.php");?>
      <?php include("blocks/header.php"); ?>
    <tr>
<td>
       <table id="table2">
          <tr>
            <?php include("blocks/left.php");?>
           
            <td width="508" id="content"><!-- content -->
           <?php $n=0; include("blocks/table.php");?>
              

              <?php if(isset($_COOKIE['login']))
              {
                echo "куки існують";

              }
              else
              {
                echo "Для того щоб побачити дане вам необхідно зайти в акаунт";
              }

              ?>

            </td>
          </tr>
       </table>
</td>

      <?php include("blocks/footer.php");?>

  </table>
</body>
</html>
