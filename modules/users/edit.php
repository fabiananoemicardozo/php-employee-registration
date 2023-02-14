<?php include("../../db.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentence=$pdo->prepare("SELECT * FROM `usertable` WHERE id=:id");
    $sentence->bindParam(":id",$txtID);
    $sentence->execute();

    $record=$sentence->fetch(PDO::FETCH_LAZY);

    $username=$record["username"];
    $email=$record["email"];
    $password=$record["password"];
}

if($_POST){
    $txtID=(isset($_POST["txtID"])?$_POST["txtID"]:"");
    $username=(isset($_POST["username"])?$_POST["username"]:"");
    $email=(isset($_POST["email"])?$_POST["email"]:"");
    $password=(isset($_POST["password"])?$_POST["password"]:"");

    $sentence=$pdo->prepare("UPDATE usertable SET username=:username, email=:email, password=:password WHERE id=:id");
    $sentence->bindParam(":id", $txtID);
    $sentence->bindParam(":username", $username);
    $sentence->bindParam(":email", $email);
    $sentence->bindParam(":password", $password);
    $sentence->execute();
    header("Location:index.php");
}


?>

<?php include("../../template/header.php"); ?>
    <br/>
    <h4>Edit user</h4>
    <div class="card">
    <div class="card-header">
       Edit user
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input type="text"
                value="<?php echo $txtID;?>"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="id">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text"
                value="<?php echo $username;?>"
                class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Write the username">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email"
                value="<?php echo $email;?>"
                class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password"
                value="<?php echo $password;?>"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Write the password">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a name="cancel" id="cancel" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php"); ?>