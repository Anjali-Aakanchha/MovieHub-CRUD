<?php

// Create record function 

function deleteRecord()
{
    $servername = 'localhost';
    $username= 'root';
    $password= '';
    $databasename='moviehub_database';


  //Creating a connection to database

    $connection = mysqli_connect($servername , $username , $password , $databasename);


   // Storing userinput into variable
    
   $id=$_POST['delete-ID'];

   //Attempting to Insert data into table
 
   $sql="DELETE FROM moviehub_table WHERE id='$id'" ;

    // Checking if inserting data was sucessful 

    $deleteQuery= mysqli_query($connection , $sql);

    if(!$deleteQuery)
    {
        echo 'Error:'.$sql.mysqli_error($connection);
        
    }
   
    // close connection 

    mysqli_close($connection);

    //Redirecting to index.php

    header ('location: index.php');



}

if(isset($_POST['submit-delete']))
{
    deleteRecord();

}
?>
