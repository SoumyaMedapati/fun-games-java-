<?php
$userarr = array() ;
$idarr   = array();
 $stmt = "SELECT id,fname FROM users";
 $resarr = $link->query($stmt);
 while($res = $resarr->fetch_object()){
     $userarr[count($userarr)] = $res->fname; 
     $idarr[count($idarr)]     = $res->id;
 }
echo "<div id='userlist' style='display:none;'>";
for($i=0;$i<count($userarr);$i++){
    echo $idarr[$i].'.'.$userarr[$i].',';
}
echo"</div>";
?>
