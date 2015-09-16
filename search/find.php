<?php

session_start();
$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");
//require "/account/db.php";



if(isset($_POST['submit']))
{
    
    

    if(isset($_POST['searchbar']))
    {
        echo "we search by bar <br>";
        $searchbar = $_POST['searchbar'];
        $query = "SELECT firstn, lastn
                                 FROM
                                 user_preferences
                                 WHERE ( (`lastn` LIKE '".$searchbar."') OR (`firstn` LIKE '".$searchbar."' ) )";                                            ";

                 
 
       
    }
    else if (isset($_POST['search']))
    {
        echo "we search by button";
        $searchgroup = $_POST['search'];
        $query= $query."(SELECT GID,GNAME,GTAGS 
                (
                 (1*(MATCH(`GNAME`) AGAINST ('".$searchgroup."'))) +  
                 (1*(MATCH(`GTAGS`) AGAINST ('".$searchgroup."'))) +
                 (1*(MATCH(`GDESCRIPTION`) AGAINST ('".$searchgroup."')))
                AS score )  
                FROM groups
                WHERE score > 0 
                ORDER BY score DESC)"; 
    
    }
  
    //search things in general
    

    $result = mysqli_query($mysqli,$query);
    echo $query."<br>";
    if ( false===$result ) {
        printf("error: %s\n", mysqli_error($mysqli));
    }
    $union_result = mysqli_fetch_array($result,MYSQLI_ASSOC); 
    print_r($union_result[0]);
}

    //rank search by matching tags/group name/group description




?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>

</body>
</html>