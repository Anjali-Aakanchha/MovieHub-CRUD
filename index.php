<!DOCTYPE HTML >
<HTML>
    <HEAD>
        <TITLE> MovieHub CRUD APP </TITLE>
        <LINK REL= "STYLESHEET" TYPE="TEXT/CSS" HREF="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> 
    </HEAD>
    <BODY>
            <div class = "main-div">
         <?php require_once 'create.php'; ?>

            <DIV name = "content">
                <H2> MOVIEHUB CRUD </H2>
                <?php

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
                    
                
                    //query the table for the record 

                    $sql = "SELECT * FROM moviehub_table";
                    $result = mysqli_query($connection , $sql);
                    $rowCount = mysqli_num_rows($result);
                    
                    if ($rowCount > 0)
                        {
                            echo "
                                <table>
                                    <thead>
                                        <tr>
                                            <th> Record ID </th>
                                            <th> Title </th>
                                            <th> Genre </th>
                                            <th> IMDB Rating </th>
                                            <th> Movie Cast </th>
                                            <th> Available On Platform </th>
                                        </tr>
                                    </thead>
                            " ;
                        }
                ?>

                <?php

                    while($row = $result->fetch_assoc()):
                ?>

                    <tr>
                        <td>
                            <?php
                                 echo
                                    $row['id']

                            ?>
                        </td>
            
                        <td>
                            <?php
                                echo
                                    $row['title']

                            ?>
                        </td>
            
                         
                        <td>
                            <?php
                                echo
                                    $row['genre']

                            ?>
                        </td>


                        <td>
                            <?php
                                echo
                                    $row['rating']

                            ?>
                        </td>
            
                        <td>
                            <?php
                                echo
                                    $row['moviecast']

                            ?>
                        </td>
            
                        <td>
                            <?php
                                echo
                                    $row['platform']

                            ?>
                        </td>
                    </tr>

                        <?php endwhile ?>

            

                </table>            


            </DIV>
            <DIV CLASS = "content-wrapper">
                <button id=  "create-button" > CREATE RECORD </button>
                <button id=  "update-button" > UPDATE RECORD </button>
                <button id=  "delete-button" > DELETE RECORD </button>

                <form action= "create.php"  method = "POST"  id= "create-form">
                    <input type = "text" placeholder = "Enter Movie Title" name="create-title"><br>
                    <input type = "text" placeholder = "Enter Movie Genre" name="create-genre"><br>
                    <input type = "text" placeholder = "Enter IMDB Rating" name="create-rating"><br>
                    <input type = "text" placeholder = "Enter Movie Cast" name="create-cast"><br>
                    <input type = "text" placeholder = "Platform Available On" name = "create-platform" ><br>
                    <input type="submit" value="SAVE" name="create-button" class="small-button" >
                </form>
                    
                <form action= "update.php"  method = "POST"  id= "update-form">
                    <input type = "text" placeholder = "Enter Record ID" name="update-ID"><br>
                    <input type = "text" placeholder = "Enter Movie Title" name="update-title"><br>
                    <input type = "text" placeholder = "Enter Movie Genre" name="update-genre"><br>
                    <input type = "text" placeholder = "Enter IMDB Rating" name="update-rating"><br>
                    <input type = "text" placeholder = "Enter Movie Cast" name="update-cast"><br>
                    <input type = "text" placeholder = "Platform Available On" name = "update-platform" ><br>
                    <input type="submit" value="SAVE" name="submit-update"  class="small-button"  >
                </form>

                <form action= "delete.php"  method = "POST"  id= "delete-form">
                    <input type = "text" placeholder = "Enter Record ID" name="delete-ID"><br>
                    <input type="submit" value="SAVE" name="submit-delete"  class="small-button"  >
                </form>

                

            </DIV>
                    </div>
        <script src="script.js"></script>
    </BODY>
</HTML>
