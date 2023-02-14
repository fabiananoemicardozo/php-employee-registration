<?php 
if($_POST){
    include("./db.php");

    $sentence=$pdo->prepare("SELECT * 
    FROM `usertable`
    WHERE username=:username
    AND password=:password");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $sentence->bindParam(":username", $username);
    $sentence->bindParam(":password", $password);
    

    echo($username, $password);
    exit;

    $sentence->execute();

    $usertable_list=$sentence->fetch(PDO::FETCH_LAZY);
    //print_r($usertable_list)
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <header>

  </header>
  <main clas="container" >

    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
        <br><br>
            <div class="card">
                
                <div class="card-header">
                Login
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text"
                            class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="write your username">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password"
                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="write your password">
                        </div>

                        <button type="submit" class="btn btn-primary">Enter</button>
                    </form>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </div>
    </div>



  </main>
  <footer>

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>
