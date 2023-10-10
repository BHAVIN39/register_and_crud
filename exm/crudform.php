<?php
include "header.php";
include "db.php";

if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $gender = $_POST['gender'];
    $language = implode(",", $_POST['language']);

    $file_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $filepath = "./images/". uniqid(). '-' . $file_name;

    move_uploaded_file($tmp_name,$filepath);

    $sql = "INSERT INTO crud (fname,lname,phone,email,message,gender,language,file) VALUES ('$fname','$lname','$phone','$email','$message','$gender','$language','$filepath')";

    mysqli_query($conn,$sql);
    header("location:crudindex.php");
}

?>

<div class="container">
    <h2>Form</h2>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col mb-3">
                <label for="fname">fname</label>
                <input type="text" class="form-control"  name="fname" id="fname" placeholder="enter fname">
            </div>
            <div class="col mb-3">
                <label for="lname">lname</label>
                <input type="lname" class="form-control" name="lname" id="lname" placeholder="enter lname">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="phone">phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="enter phone no">
            </div>
            <div class="col mb-3">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email"  name="email" placeholder="enter email">
            </div>
            <div class="col mb-3">
                <label for="message">message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col my-3">
                <label for="gender">gender</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>
            <div class="col my-3">
                <label for="language">language</label>

                <input type="checkbox" name="language[]" id="gujarati" value="gujarati">
                <label for="gujarati" class="mr-2">Gujarati</label>

                <input type="checkbox" name="language[]" id="hindi" value="hindi">
                <label for="hindi" class="mr-2">Hindi</label>

                <input type="checkbox" name="language[]" id="english" value="english">
                <label for="english">English</label>

            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="file">select file</label>
                <input type="file" class="form-control" id="file" name="file" style="padding: 3px 11px;">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
    </form>
</div>