<table width="100%" class="table_nav" >
       <tr>
      <td width="25%" <? if (isset($n)) {if($n==1){echo "class='nav_e'";} else{ echo "class='nav_t'";} }?>><a href="index.php" >головна</a></td>
      
       <td width="25%" <? if (isset($n)) {if($n==2){echo "class='nav_e'";}else{ echo "class='nav_t'";}}?>><a href="subscribe.php" >розсилка</a></td>
       
       <td width="25%" <? if (isset($n)) {if($n==3){echo "class='nav_e'";}else{ echo "class='nav_t'";}}?>><a href="goodies.php" >товари</a></td>

       <td width="25%" <? if (isset($n)) {if($n==4){echo "class='nav_e'";}else{ echo "class='nav_t'";}}?>><a href="about.php" >про нас</a></td>
     </tr>
</table>
<br>