<?php include("../../db.php");

if($_POST){
    print_r($_POST);
    //preparando los datos del método POST
    $workposition=(isset($_POST["workposition"])?$_POST["workposition"]:"");
    //Preparando la insercción de os datos
    $sentence=$pdo->prepare("INSERT INTO positiontable(id,workposition) VALUES (null, :workposition)");
    //Asignando los valores que vienen del método POST y usan :variable
    $sentence->bindParam(":workposition", $workposition);
    $sentence->execute();
    header("Location:index.php");
}

?>

<?php include("../../template/header.php"); ?>
    <br/>
<h4>Create work position</h4>
<div class="card">
    <div class="card-header">
        Positions
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="workposition" class="form-label">Job title</label>
              <input type="text"
                class="form-control" name="workposition" id="workposition" aria-describedby="helpId" placeholder="Write the name of the job position">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a name="cancel" id="cancel" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../template/footer.php"); ?>