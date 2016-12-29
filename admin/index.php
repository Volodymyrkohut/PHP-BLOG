

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta mame="description" content="<?php echo $myrow['meta_d'];?>">
    <meta mame="keywords" content="<?php echo $myrow['meta_k'];?>">
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
             <br>
              <p>Кабінет адміністратора</p>
              
            </td>
          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
