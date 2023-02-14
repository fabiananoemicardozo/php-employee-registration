<?php include("../../db.php");

if(isset($_GET['txtID'])){
  $txtID=(isset($_GET['txtID'])?$_GET['txtID']:"");

  $sentence=$pdo->prepare("SELECT * FROM `employeestable` WHERE id=:id");
  $sentence->bindParam(":id",$txtID);
  $sentence->execute();

  $record=$sentence->fetch(PDO::FETCH_LAZY);

  $lastname=$record["lastname"];
  $name=$record["name"];
  $personalphone=$record["personalphone"];
  $email=$record["email"];
  $position=$record["position"];
  $dataofadmission=$record["dataofadmission"];

  $sentence=$pdo->prepare("SELECT * FROM `positiontable`");
  $sentence->execute();
  $positiontable_list=$sentence->fetchAll(PDO::FETCH_ASSOC);
}

if($_POST){
  $txtID=(isset($POST['txtID'])?$POST['txtID']:"");
  $lastname=(isset($_POST["lastname"])?$_POST["lastname"]:"");
  $name=(isset($_POST["name"])?$_POST["name"]:"");
  $personalphone=(isset($_POST["personalphone"])?$_POST["personalphone"]:"");
  $email=(isset($_POST["email"])?$_POST["email"]:"");
  $position=(isset($_POST["position"])?$_POST["position"]:"");
  $dataofadmission=(isset($_POST["dataofadmission"])?$_POST["dataofadmission"]:"");

  $sentence=$pdo->prepare("UPDATE employeestable SET lastname=:lastname, name=:name, personalphone=:personalphone, email=:email, position=:position, dataofadmission=:dataofadmission WHERE id=:id");
  $sentence->bindParam(":lastname", $lastname);
  $sentence->bindParam(":name", $name);
  $sentence->bindParam(":personalphone", $personalphone);
  $sentence->bindParam(":email", $email);
  $sentence->bindParam(":position", $position);
  $sentence->bindParam(":dataofadmission", $dataofadmission);
  $sentence->execute();
  header("Location:index.php");
}

?>

<?php include("../../template/header.php"); ?>
    <br/>
<h4>Edit employee</h4>
<div class="card">
    <div class="card-header">
        Edit employee
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
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text"
                value="<?php echo $lastname;?>"
                class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="Write your last name">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text"
                value="<?php echo $name;?>"
                class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Write your name">
            </div>
            <div class="mb-3">
              <label for="personalphone" class="form-label">Personal phone</label>
              <input type="text"
                value="<?php echo $personalphone;?>"
                class="form-control" name="personalphone" id="personalphone" aria-describedby="helpId" placeholder="Write your personal phone">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" 
                value="<?php echo $email;?>"
                class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select class="form-select form-select-lg" name="position" id="position">
                  <?php foreach($positiontable_list as $record) { ?>
                    <option <?php echo ($position== $record['id'])?"selected":"";?> 
                        value="<?php echo $record['id']?>"><?php echo $record['workposition']?>
                    </option>
                  <?php } ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="dataofadmission" class="form-label">Date of admission</label>
              <input type="date" 
                value="<?php echo $dataofadmission;?>"
                class="form-control" name="dataofadmission" id="dataofadmission" aria-describedby="dataofadmission" placeholder="Data of admission">
            </div>
            <button type="submit" class="btn btn-success">save</button>
            <a name="cancel" id="cancel" class="btn btn-danger" href="index.php" role="button">cancel</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php"); ?>