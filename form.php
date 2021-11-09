<?php 

require_once "inc/header.php";

$error = [];

if(isset($_POST['submit'])){

    $name = trim(htmlentities($_POST['name']));
    $email = trim(htmlentities($_POST['email']));
    $password = trim($_POST['password']);
    $photo = $_FILES['photo'];

    if(empty($name)){
        $error ['nameErr'] = "Enter your name!";
    }

    if(empty($email)){
        $error ['emailErr'] = "Enter your email!";
    }

    if(empty($password)){
        $error ['passErr'] = "Enter your password!";
    }

    if(empty($photo)){
        $error ['photoErr'] = "Enter your photo!";
    }

    if(!empty($name) && !empty($email) && !empty($password) && !empty($photo['name'])){
        require_once "db.php";
        $encPass = sha1($password);
        $InsertQuery = "INSERT INTO user table(name, email, password, photo) VALUES ('$name','$email','$encPass','photo.jpg')";
        
        $dataInsert = mysqli_query($dbconnect, $InsertQuery);

        if($dataInsert){
            echo "data inserted";
        }
    }


    
}

?>




<section class='py-5'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2>PHP Form</h2>
                    </div>

                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                    
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                                <?php
                                    if(isset($error['nameErr'])){
                                        echo '<p class="text-danger">' .$error['nameErr']. '</p>';
                                    }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" name="email" class="form-control" id="email">
                                <?php
                                    if(isset($error['emailErr'])){
                                        echo '<p class="text-danger">' .$error['emailErr']. '</p>';
                                    }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" id="Password">
                                <?php
                                    if(isset($error['passErr'])){
                                        echo '<p class="text-danger">' .$error['passErr']. '</p>';
                                    }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" id="photo">
                                <?php
                                    if(isset($error['photoErr'])){
                                        echo '<p class="text-danger">' .$error['photoErr']. '</p>';
                                    }
                                ?>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php 

require_once "inc/footer.php";
?>