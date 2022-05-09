<?php
// connect to the database
include 'login_db.php';
$s = "SELECT * FROM materials WHERE `id_user`='$_SESSION[college_id]'";
$result = mysqli_query($conn, $s);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
     // Count total uploaded files
     $totalfiles = count($_FILES['myfile']['name']);

    // Looping over all files
    for($i=0;$i<$totalfiles;$i++){
        $filename = $_FILES['myfile']['name'][$i];
        
        // Upload files and store in database
        if(move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],'uploads/'.$filename)){

                // Image db insert sql
                $insert = "INSERT into materials (id_user,name, size, downloads) VALUES ('$_SESSION[college_id]','$filename',now(),1)";
                if(mysqli_query($conn, $insert)){
                    echo 'Data inserted successfully';
                    }
                else{
                    echo 'Error: '.mysqli_error($conn);
                    }
        }
        else{
                echo 'Error in uploading file - '.$_FILES['myfile']['name'][$i].'<br/>';
            }
   }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sq = "SELECT * FROM materials WHERE id=$id";
    $result = mysqli_query($conn, $sq);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE materials SET downloads=$newCount WHERE id=$id";//what is the id
        mysqli_query($conn, $updateQuery);
        exit;
    }
}