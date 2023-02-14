<?php include("../../db.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentence=$pdo->prepare("DELETE FROM usertable WHERE id=:id");
    $sentence->bindParam(":id",$txtID);
    $sentence->execute();
    header("Location:index.php");
}

$sentence=$pdo->prepare("SELECT * FROM `usertable`");
$sentence->execute();
$usertable_list=$sentence->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../../template/header.php"); ?>
    <br/>
    <h4>Users</h4>
<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add user</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table"  id="tableID">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User name</th>
                        <th scope="col">email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($usertable_list as $record) { ?>
                    <tr class="">
                        <td scope="row"><?php echo $record['id'];?></td>
                        <td><?php echo $record['username'];?></td>
                        <td><?php echo $record['email'];?></td>
                        <td><?php echo $record['password'];?></td>
                        <td>
                            <a name="btnedit" id="btnedit" class="btn btn-info" href="edit.php?txtID=<?php echo $record['id'];?>" role="button">edit</a>
                            <a name="btncancel" id="btncancel" class="btn btn-danger" href="javascript:borrar(<?php echo $record['id'];?>);" role="button">cancel</a>
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