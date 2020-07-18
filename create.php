<?php

// Create record function 

function createRecord()
{
    $servername = 'localhost';
    $username= 'root';
    $password= '';
    $databasename='moviehub_database';


  //Creating a connection to database

    $connection = mysqli_connect($servername , $username , $password , $databasename);

    //Check if connection was sucessful or not 

    if(!$connection)
    {
    die ('connection unsucessful'.mysqli_connect_error());
    }
    
   // Storing userinput into variable
    
   $movieTitle = $_POST['create-title'];
   $movieGenre = $_POST['create-genre'];
   $movieRating = $_POST['create-rating'];
   $movieCast = $_POST['create-cast'];
   $moviePlatform = $_POST['create-platform'];

   //Attempting to Insert data into table
 
   $sql="INSERT INTO moviehub_table(title , genre, rating , moviecast , platform ) VALUES ('$movieTitle' , '$movieGenre' , '$movieRating', '$movieCast', '$moviePlatform')" ;

    // Checking if inserting data was sucessful 

    if (mysqli_query($connection , $sql))
    {
        echo'';
    }
    else
    {
        echo 'Error:'.$sql.mysqli_error($connection);
    }

    // close connection 

    mysqli_close($connection);

    //Redirecting to index.php

    header ('location: index.php');



}

if(isset($_POST['create-button']))
{
    createRecord();

}
?>
