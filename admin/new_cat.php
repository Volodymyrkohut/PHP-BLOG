

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
  	   
       <table id="table2" >
          <tr>
            <? include("blocks/left.php"); ?>
             <td width="508" id="content">
              <!-- content -->
                     <form action="add_cat.php" method="post" name="form">
                      <br>
               

                   <label>Добавити назву категорії категорію <br>
                      <input type="text" name="title" size="25">
                   </label>

                    <br><br>

                  <label>добавити коротке описання - meta_d <br>
                      <input type="text" name="meta_d" size="25">
                   </label>

                   <br><br>



                   <label>ключеві слова meta_k <br>
                      <input type="text" name="meta_k" size="25">
                   </label>
                  <br><br>

                   <label>добавити короткий текст -  text <br>
                      <textarea cols="50" rows="20" name="text"></textarea>
                   </label>

                   

                   <br>
                   <br>
                   
                   <input type="submit" name="submit" value="Добавити" >
               </form>
           
          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>
