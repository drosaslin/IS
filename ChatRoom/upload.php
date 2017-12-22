<?php
    include_once ("includes/dbms.php");
    session_start();

    if(isset($_POST['upload']))
    {
        $file_name=uniqid().date("Y-m-d-H-i-s").md5($_FILES['image']['name']);

        $destination="images/".$file_name;
        $filename=$_FILES['image']['tmp_name'];
        $username=mysqli_real_escape_string($conn,$_SESSION["uid"]);

        if(move_uploaded_file($filename,$destination))
        {
            $sql="INSERT INTO messages (username, image) VALUES ('$username', '$destination')";
            mysqli_query($conn,$sql);
            header('Location: NewMessages.php');
        }
    }

    function showImage($path, $conn)
    {
        echo "<img style='width:150px;' src=".$path.">";

        $md5file = md5_file("$path");
        file_put_contents("md5file.txt",$md5file);
        $md5file = file_get_contents("md5file.txt");
        if (md5_file("$path") != $md5file)
        {
            echo "The file has been corrupted.";
        }
    }
?>
