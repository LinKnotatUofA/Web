<html>

<head>

<?php


$username = @$_POST['user_name'];
$password = @$_POST['password'];
$repeatpassword = @$_POST['repeatpassword'];
$submit = @$_POST['submit'];
$encpassword = $password;
//use md5($password) for encryption later
$ID = 100;

 $mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");

//attempt to include a new ID 
$query = mysqli_query($mysqli,"SELECT ID FROM user WHERE ID=$ID");

$numrows = mysqli_num_rows($query);

while($numrows > 0)
{
    $ID = rand(1,10000);
    $query = mysqli_query($mysqli,"SELECT ID FROM user WHERE ID=$ID");
    $numrows = mysqli_num_rows($query);
}




/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if($submit){
    
    if($username == true)
    {
        
        
        
        if($password == true)
        {
            
            if($password==$repeatpassword)
            {
                
                if(strlen($username)<50)
                {
                    
                    
                    if(strlen($password <50||strlen($password)>5))
                    {
                        
                        $insert=mysqli_query($mysqli,"INSERT INTO user VALUES ('$ID','$username','$encpassword','','false')");
                        $userdetail=mysqli_query($mysqli,"INSERT INTO user_preferences VALUES('$ID,'','','','')");
                        echo "registration successful";
                        if ( false===$insert ) {
                            printf("error: %s\n", mysqli_error($mysqli));
                        }
                        
                        
                        
                    }
                    else
                        echo
                        "password length is between 5 to 50 characters";
                    
                }
                else
                    echo "the maximum length for username is 50";
                
            }
            else
                echo"you did not successfully repeat your password";
            
        }
        else
            echo "please enter a password";
        
    }
    else 
        echo "please enter a username";
}

?>

</head>


<body>
    <form id="form1" method ="post">   
       	<p>Username: <input name ="user_name" type="text" /></p> 
        <p>Password: <input name ="password" type="password" /></p>
        <p>Repeat Password: <input name ="repeatpassword" type="password" /></p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1);return true;"></p>		
    </form>
</body>
</html>