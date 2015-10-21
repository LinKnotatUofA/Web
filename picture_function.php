<?php

function load_picture($mysqli, $nameID){
   $userpic_query = mysqli_query($mysqli,"SELECT user_profile_pic FROM user WHERE id ='$nameID'");
   $userpic=mysqli_fetch_assoc($userpic_query); 
   return $userpic['user_profile_pic'];
}
?>