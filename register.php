<?php 

    require  "./database.php";

    $error = null ;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(empty($_POST["email"]) || empty($_POST["name"]) || empty($_POST["password"])){
          $error = "please fill all the fileds.";
      } else if(!strpos($_POST["email"] , "@")){
          $error = "Email format is incorrect";
      }else{
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if($statement->rowCount() > 0 ){
            $error =  "this email is taken";
        }else{
            $conn
            ->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)")
            ->execute([
              ":name" => $_POST["name"],
              ":email" => $_POST["email"],
              ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
            ]);
  
            session_start();
            $_SESSION["user"] = $user;

            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $statement->bindParam(":email", $_POST["email"]);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["user"] = $user;

            header("Location: home.php");
        }
      }
    }
?>

<?php require  "./partials/header.php"?>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                        <div class="card-body">
                            <?php if ($error):?>
                                <p class="text-danger">
                                    <?= $error ?>
                                </p>
                            <?php endif ?>   
                            <form method="POST" action="register.php">
                                
                                <!--name-->
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="tel" class="form-control" name="email" required autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <!-- password -->
                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Passwor</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="phone_number" autofocus>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require "./partials/footer.php"?>