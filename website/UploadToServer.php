<?php
  
   //echo 'potato';

    $mysqli = new mysqli("127.0.0.1", "root", "asdf1234%", "moodle");
    if ($mysqli->connect_errno) 
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }else
    {
        echo "the connection works";

    }


    // $query2 = "truncate table mdl_files_params;";
    // $result2 = $mysqli->query($query2);

    //$query = "select filesdir from mdl_files_params;";
    $query = "select filesdir from mdl_files_params order by id desc limit 1";
	$result = $mysqli->query($query);
	$row = $result->fetch_row();
    //echo $row[0];
    //$file_path = "/var/www/barcamp/uploads/";        
    $file_path=$row[0];
    $file_path = $file_path.basename( $_FILES['uploaded_file']['name']);
    //echo $file_path;
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
    } else{
        echo "fail";
    }


    
     // $query2 = "truncate table mdl_files_params;";
     // $result2 = $mysqli->query($query2);




 ?>





