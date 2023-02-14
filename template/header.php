<?php
$url_base="http://localhost/PHPHR/";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Human Resources</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url_base;?>index.php" aria-current="page">Sistem<span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>modules/employees">Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>modules/positions/">Positions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>modules/users/">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>logout.php">Logout</a>
            </li>
        </ul>
    </nav>
  </header>
  <main class="container">