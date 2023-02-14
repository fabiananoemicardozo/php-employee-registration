<?php include("../../db.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentence=$pdo->prepare("DELETE FROM employeestable WHERE id=:id");
    $sentence->bindParam(":id",$txtID);
    $sentence->execute();
    header("Location:index.php");
}


$sentence=$pdo->prepare("SELECT *, 
    (SELECT workposition FROM positiontable WHERE positiontable.id=employeestable.id limit 1) 
    as position FROM `employeestable`");
$sentence->execute();
$employeestable_list=$sentence->fetchAll(PDO::FETCH_ASSOC);


?>


<?php include("../../template/header.php"); ?>
<br/>
<h4>Employees</h4>
<br/>
<div class="card">
    <div class="card-header">     
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Register a new employee</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tableID">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Personal phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">PDF Resume</th>
                        <th scope="col">Position</th>
                        <th scope="col">Date of admission</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($employeestable_list as $record) { ?>
                    <tr class="">
                        <td scope="row"><?php echo $record['id'];?></td>
                        <td><?php echo $record['lastname'];?> <?php echo $record['name'];?></td>
                        <td><?php echo $record['personalphone'];?></td>
                        <td><?php echo $record['email'];?></td>
                        <td>
                            <a href="<?php echo $record['resume'];?>">
                                <?php echo $record['resume'];?>
                            </a>
                        </td>
                        <td><?php echo $record['position'];?></td>
                        <td><?php echo $record['dataofadmission'];?></td>
                        <td>
                            <a name="btnedit" id="btnedit" class="btn btn-info" href="edit.php?txtID=<?php echo $record['id'];?>" role="button">edit</a>
                            <a name="btncancel" id="btncancel" class="btn btn-danger" href="javascript:borrar(<?php echo $record['id'];?>);" role="button">delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="card-footer text-muted"></div>
</div>
<br/>

<script>
    function borrar(id){
        Swal.fire({
        title: 'Are you sure you want to delete this record?',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete',
    }).then((result) => {
    if (result.isConfirmed) {
        window.location="index.php?txtID="+id;
    }})
    }
</script>

<?php include("../../template/footer.php"); ?>