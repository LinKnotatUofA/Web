<html>
	<head>
	<link type='text/css' rel='stylesheet' href='style.css'/>
		<title>PHP</title>
	</head>
	<body bgcolor="#E0FFFF">
	
		<div class="header" align="center" style="border:1px solid black"><h1>
			<?php
			$title = "Welcome to my web page!";
			echo $title;
		
			?>
		</h1></div>
		<?php echo "<br>"; ?>
		<div style="float:right;"><img src="image1.png"/></div>
		<?php echo "<br>";?>

		<?php 
		date_default_timezone_set("America/Edmonton");
		echo "<br>";
		$date = "Date:  ";
		$time = "Time:  ";
		$day = "Day:  ";
		echo "$date";
		echo(date(" F d, Y ",time()));
		echo "<br>";
		echo $time;
		echo(date("g.i A <br>",time()));
		echo ("<br> $day");
		$day  = date("l");
		echo $day;
		?>
		
		<p>Want to know more about me? Check out the following links:</p>
		<a href="MyResume.pdf">  1. Resume</a>
		<p><a href="http://ca.linkedin.com/in/rupehrachouhan">  2. LinkedIn profile</a></p>
		
		<form action="Tutorial.php" method="POST">
		Suggestions: <input type="text" name="suggestion"/><br><br>
		<input type="submit", value="submit"/><br>
		</form>
		
		<?php
		if(isset($_POST['suggestion'])){
			$suggestion = $_POST['suggestion'];
			echo ("You suggestion is: ");
			echo $suggestion;
			echo '<br>';
		}
		?>
		<?php
		$filename = "suggestion.txt";
		$file = fopen( $filename, "w" );
		if( $file == false )
		{
			echo ( "Error in opening new file" );
			exit();
		}
		fwrite( $file, $suggestion );
		fclose( $file );
		?>
		
		<?php
		if(( $filename ) )
		{
			$filesize = filesize( $filename );
			$msg = "\nFile size: $filesize bytes";
			$file = fopen($filename,"a");
			fwrite($file,$msg );
			fclose($file);
		}
		else
		{
			echo ("File $filename does not exit" );
		}
		
		?>
		<a href= "suggestion.txt"> Visit your feedback file from here</a>
		<p><img src="pho.png" alt="Smiley face" style="center;width:42px;height:42px" >
		</p>
		
		<?php
		/*$cars = array("Volvo", "BMW", "Toyota");
		$arrlength = count($cars);

		foreach($cars as $car)    									  #for loop 
		{
		echo "Car is $car <br />";
		}*/
		
		include('data.php');
		
?>
	


	</body>
</html>