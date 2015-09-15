<html>

<head>

<?php
//Create a new PHPMailer instance
require"/phpmailer/class.phpmailer.php";
$mail = new PHPMailer();


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


$mysqli = new mysqli("us-cdbr-azure-west-c.cloudapp.net", "bea1032a957a19", "c03cc102", "bsquared");


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
                
                if(strpos($username,'@ualberta.ca')!== false)
                {
                    
                    
                    if(strlen($password <50||strlen($password)>5))
                    {
                        $message = "Hello, if u recieved this message u must be a very deeply involved member for the Bsquared project. Click the meesage below to verify your registration";

                       
                        $date = date("Y-m-d");
                        $insert=mysqli_query($mysqli,"INSERT INTO user VALUES ('$ID','$username','$encpassword','NULL',0,0)");
                         if ( false===$insert) {
                            printf("user account registration error: %s<br>", mysqli_error($mysqli));
                           
                        }
                        $userdetail=mysqli_query($mysqli,"INSERT INTO `bsquared`.`user_preferences` (`user_id`, `prefered_color`, `birthdays`, `firstn`, `lastn`) VALUES ('$ID', '#3CB6CE', NULL, NULL, NULL)" );
                        
                        if ( false===$userdetail ) {
                            printf("user preferences registration error: %s<br>", mysqli_error($mysqli));
                           
                        }
                        else
                        {
                            echo "registration successful";
                        }
                        

                        
                        /*if(@mail($username, 'Bsquared', $message))
                        {
                           echo"mail sent successfully";
                        }
                        else
                        {
                           echo"mail not delivered";
                        }*/
                        
                    }
                    else
                        echo
                        "password length is between 5 to 50 characters";
                    
                }
                else
                    echo "please make sure u are signing up with a ualberta email address, this service is not open to the general public";
                
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
       	<p>Ualberta Email: <input name ="user_name" type="text" /></p> 
        <p>Password: <input name ="password" type="password" /></p>
        <p>Confirm Password: <input name ="repeatpassword" type ="password" /></p>
        <p><input name ="submit" type="submit"/> <INPUT Type="button" VALUE="Cancel and go back" onClick="history.go(-1);return true;"></p>		
    </form>
</body>
</html>