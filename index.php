<!Doctype Html> 
<html>
<head>
<title> Customer records </title>
</head>
<body>
         <form name="my_form" method="POST" action ="<?php $_SERVER ['PHP_SELF'] ; ?>" >
			<h1> Input your customer record </h1>
			<p> <Input type="text" name="Name" placeholder="Customer Name" > </p>
			<p> <Input type="Email" name="Email" placeholder="Email" > </p>
			<p> <Input type="text" name="Number" placeholder="Phone Number" > </p>
			<p> <Input type="text" name="Location" placeholder = "Location" > </p>
			<Input type="Submit" name="submit" value="Submit" >
         </form>
<?php

//Including the configuration file. 
require_once ('connection.php');

//Checking If the user has submitted the form
if (isset ($_POST ['submit'] )) {
     //checking If the user has completely fill all the form field
     if ( isset ($_POST ['Name'] , $_POST ['Email'] ,$_POST ['Number'] ,$_POST ['Location'] ) )
      {
		
		$Name = mysqli_real_escape_string ($conn , $_POST ['Name']) ;
		$Email = mysqli_real_escape_string ($conn , $_POST ['Email']) ; 
		$Number = mysqli_real_escape_string ($conn , $_POST ['Number']) ;
		$Location = mysqli_real_escape_string ($conn , $_POST ['Location']) ;

		//Inserting the submitted data into the database. 
		$sql = "INSERT INTO usersTable (Name , Email , Number , Location) VALUES ('$Name' , '$Email' , '$Number' , '$Location')" ;

		//checking if the Query is successful. 
		if (mysqli_query ($conn , $sql) ) {		 
		   $msg = "Successfully Created" ; 		 
		}
		else {
		   $msg = "oops! There is an error when creating your record. Retry again" ; 		 
		}  
    }
}
?> 

</body>
</html>
