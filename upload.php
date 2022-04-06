<?php
include 'dbcon.php';
$email=1;
if(isset($_POST['submit'])){
    //$date = $_POST['date'];
    $username = $_POST['username'];
    $subject = $_POST['subject'];
    $title = $_POST['title'];
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $filePath = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('pdf','jpg','png','jpeg','docx');
    

    if(!in_array($fileActualExt, $allowed)){
       
        echo '<script>alert("You cannot upload this type of file!"); window.location.href="submitMaterial.html"</script>';
    }

    if($fileError != 0)
    {
        echo '<script>alert("Could not upload file"); window.location.href="submitMaterial.html"</script>';
        //throw new Exception("Could not upload file");
    }

    if($fileSize > 1000000){
        echo '<script>alert("Your file is too big"); window.location.href="submitMaterial.html"</script>';
        //throw new Exception("Your file is too big");
    }

    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = 'uploads/'.$fileNameNew;
    move_uploaded_file($filePath, $fileDestination);

    $insertQuery = "insert into resources(UploadedBy,id , Subject, Title, Document) values('$username','$email','$subject', '$title', '$fileDestination')";

    $queryResponse = mysqli_query($con, $insertQuery);

    if($queryResponse) {
        echo '<script>alert("File Uploaded Successfully"); window.location.href="submitMaterial.html"</script>';
    }
    else {
        echo "File not uploaded";
    }

}

?>