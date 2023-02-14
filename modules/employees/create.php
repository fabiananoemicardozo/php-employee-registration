<?php include("../../db.php");


if($_POST){
  $lastname=(isset($_POST["lastname"])?$_POST["lastname"]:"");
  $name=(isset($_POST["name"])?$_POST["name"]:"");
  $personalphone=(isset($_POST["personalphone"])?$_POST["personalphone"]:"");
  $email=(isset($_POST["email"])?$_POST["email"]:"");
  $resume=(isset($_FILES["resume"]['name'])?$_FILES["resume"]['name']:"");
  $position=(isset($_POST["position"])?$_POST["position"]:"");
  $dataofadmission=(isset($_POST["dataofadmission"])?$_POST["dataofadmission"]:"");

  $sentence=$pdo->prepare("INSERT INTO `employeestable`(id,lastname,name,personalphone,email,resume,position,dataofadmission) VALUES (null, :lastname, :name, :personalphone, :email, :resume, :position, :dataofadmission)");


  $sentence->bindParam(":lastname",$lastname);
  $sentence->bindParam(":name",$name);
  $sentence->bindParam(":personalphone",$personalphone);
  $sentence->bindParam(":email",$email);
  $sentence->bindParam(":resume",$resume);
  $sentence->bindParam(":position",$position);
  $sentence->bindParam(":dataofadmission",$dataofadmission);

  $sentence->execute();
  header("Location:index.php");

  
}

$sentence=$pdo->prepare("SELECT * FROM `positiontable`");
$sentence->execute();
$positiontable_list=$sentence->fetchAll(PDO::FETCH_ASSOC);


?>

<?php include("../../template/header.php"); ?>
    <br/>
<h4>Create employee</h4>
<div class="card">
    <div class="card-header">
        Add employee data
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="lastname" class="form-label">Last name</label>
              <input type="text"
                class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="Write your last name">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text"
                class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Write your name">
            </div>
            <div class="mb-3">
              <label for="personalphone" class="form-label">Personal phone</label>
              <input type="text"
                class="form-control" name="personalphone" id="personalphone" aria-describedby="helpId" placeholder="Write your personal phone">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
            </div>
            <div class="mb-3">
              <label for="resume" class="form-label">Resume in PDF file</label>
              <input type="file"
                class="form-control" name="resume" id="resume" aria-describedby="helpId" placeholder="Attach your resume">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select class="form-select form-select-lg" name="position" id="position">
                  <?php foreach($positiontable_list as $record) { ?>
                    <option value="<?php echo $record['id'];?>"><?php echo $record['workposition'];?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="dataofadmission" class="form-label">Date of admission</label>
              <input type="date" class="form-control" name="dataofadmission" id="dataofadmission" aria-describedby="dataofadmission" placeholder="Data of admission">
            </div>
            <button type="submit" class="btn btn-success">save</button>
            <a name="cancel" id="cancel" class="btn btn-danger" href="index.php" role="button">cancel</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php"); ?>