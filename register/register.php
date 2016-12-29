<?php
ob_start();  //для того щоб нокописувалося в буфері , а потім куки всі і сесії зберігалися
include("blocks/db.php");
if(isset($_POST['submit'])){

$login=$_POST['login'];
$password = $_POST['password'];
$result = mysql_query("SELECT * FROM register WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if(md5($password) == $myrow['password']){
SetCookie("login", $login, time() + 3600);
$_COOKIE['login'] = $login;
}

else
{
  echo "Ви ввели невірно свій логін або пароль";
}

}


if (isset($_COOKIE['login']))
{

  echo "<tr >
        <td class='reg'>
        <p>Ласкаво просимо</p> ".$_COOKIE['login']."<form method='post' action='exit.php'>
 <input type='submit' name='submit' value='Вихід'>
</form>
 <button><a href='user_room.php' class='register_url'>Кімната користувача</a></button>
        </td>
        </tr>";
}



else 
{
echo '<tr >
<td class="register">
    <p class="auto_t">Авторизація на сайті</p><br>
    <div class="reg">
      <form method="post" action="index.php" name="form">
          <label> 
              Введіть свій логін:<br>
              <input type="text" name="login" placeholder="Логін" required>
          </label>

          <label> 
               <br><br>
               Введіть свій пароль:<br>
              <input type="password" name="password" placeholder="Пароль" required>
          </label>
              <br><br>
             <input type="submit" name="submit" value="Ввійти">
      </form>
      <br>
      <button><a href="for_register.php" class="register_url">Регістрація</a></button>
    </div>
      </td>
  </tr>';
}

?>




<!--

echo "Ви зайшли під логіном".$_COOKIE['login'];
echo
  "<script language 'javascript'  type='text/javascript'>
function gona (){
  location = 'user.php'
}
  setTimeout('gona()',2000);

  </script> <p>Ви ввійшли в свій акаунт</p>";

-->