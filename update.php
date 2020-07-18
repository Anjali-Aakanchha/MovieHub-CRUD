<?php

    function updateRecord()
    {
        $servername = 'localhost';
        $username= 'root';
        $password= '';
        $databasename='moviehub_database';
    
    
      //Creating a connection to database
    
        $connection = mysqli_connect($servername , $username , $password , $databasename);

        // Storing userinput into variable


        $id = $_POST['update-ID'];
        $movieTitle = $_POST['update-title'];
        $movieGenre = $_POST['update-genre'];
        $movieRating = $_POST['update-rating'];
        $movieCast = $_POST['update-cast'];
        $moviePlatform = $_POST['update-platform'];

        // Setup/Define our UPDATE query , the run it 

        $sql = "UPDATE moviehub_table SET title= '$movieTitle' , genre = '$movieGenre' , rating = '$movieRating' , moviecast = '$movieCast' , platform = '$moviePlatform' WHERE id='$id' ";
        
        $updateQuery = mysqli_query($connection , $sql);

        if(!$updateQuery)
        {
            echo 'Error:' .$sql.mysqli_error($connection);

        }
       

        // close connection

        mysqli_close($connection);

        //Redirect 

        header('location : index.php');
    }

    if(isset($_POST['submit-update']))
        {
            updateRecord();
        }

?>