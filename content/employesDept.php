<?php 

include ("../fonctions/fonctions.php");

$id_dept = $_GET['id_dept'] ?? null;

if ($id_dept == null){  
    header("Location:../index.php");
    exit();
}

$deptName = getDeptName($id_dept);
$employes = getAllEmployesFrom($id_dept);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés : <?= $deptName ?></title>  
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/mystyle.css">
</head>
<body>
    <header>
        
    </header>
    <main class="container my-4">
        <a href="../index.php" id="index-return-link">Retour à l'index </a>
        <h1 class="mt-3 position-sticky sticky-top bg-white py-3">Employés du département : <?= htmlspecialchars($deptName) ?></h1>
        <ul class="list-group mt-4">
            <?php foreach ($employes as $emp) { ?>
                <li class="list-group-item"><?= htmlspecialchars($emp['employe']) ?></li>
            <?php } ?>
        </ul>
    </main>

    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>