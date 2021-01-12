<?php

if(isset($_POST["submit"])){
    $target_dir = "halls/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $con = mysqli_connect("localhost","root","26091999","hall_booking");
            if (mysqli_connect_errno())
                die("\nFailed to connect to MySQL: ".mysqli_connect_error());
            $stmt = $con->prepare("INSERT INTO halls (`hname`, `location`) VALUES (?,?)");
            $hname = $_POST['hname'];
            $loaction = basename($_FILES["fileToUpload"]["name"]);
            $stmt->bind_param("ss", $hname,$loaction);
            if($stmt->execute()){
                echo("<script>alert('Successfully Added the hall!');</script>");
                $hname=$loaction="";
            } else {
            echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
}
?>