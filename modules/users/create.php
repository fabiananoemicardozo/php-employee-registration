<?php include("../../db.php");

if($_POST){
    $username=(isset($_POST["username"])?$_POST["username"]:"");
    $email=(isset($_POST["email"])?$_POST["email"]:"");
    $password=(isset($_POST["password"])?$_POST["password"]:"");

    $sentence=$pdo->prepare("INSERT INTO usertable(id,username,email,password) VALUES (null, :username, :email, :password)");
    $sentence->bindParam(":username", $username);
    $sentence->bindParam(":email", $email);
    $sentence->bindParam(":password", $password);
    $sentence->execute();
    header("Location:index.php");
}

?>

<?php include("../../template/header.php"); ?>
    <br/>
    <h4>Create user</h4>
<div class="card">
    <div class="card-header">
        user
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text"
                class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Write the username">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Write the password">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a name="cancel" id="cancel" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php"); ?>