<?php include("../../db.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    
    $sentence=$pdo->prepare("SELECT * FROM `positiontable` WHERE id=:id");
    $sentence->bindParam(":id",$txtID);
    $sentence->execute();
    $record=$sentence->fetch(PDO::FETCH_LAZY);
    $workposition=$record["workposition"];
}

if($_POST){
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $jobtitle=(isset($_POST["workposition"])?$_POST["workposition"]:"");
    
    $sentence=$pdo->prepare("UPDATE positiontable SET workposition=:workposition WHERE id=:id");
    $sentence->bindParam(":workposition", $jobtitle);
    $sentence->bindParam(":id", $txtID);
    $sentence->execute();
    header("Location:index.php");
}


?>

<?php include("../../template/header.php"); ?>
    <br/>
<h4>Edit work position</h4>
<div class="card">
    <div class="card-header">
        Edit position
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
              <label for="workposition" class="form-label">Job title</label>
              <input type="text"
                value="<?php echo $workposition ;?>"
                class="form-control" name="workposition" id="workposition" aria-describedby="helpId" placeholder="Write the name of the job position">
            </div>
            <button type="submit" class="btn btn-success" href="index.php">save</button>
            <a name="cancel" id="cancel" class="btn btn-danger" href="index.php" role="button">cancel</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../template/footer.php"); ?>