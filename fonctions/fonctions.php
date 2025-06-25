<?php 

require ("connectdb.php");

function getAllDepartments(){
    $db = getDB();

    $sql = 
        "SELECT 
            d.dept_no as id,
            d.dept_name as nom_departement,
            CONCAT(e.first_name, ' ', e.last_name) as manager
        FROM departments as d
            LEFT JOIN dept_manager as dm
                ON dm.dept_no = d.dept_no AND dm.to_date = '9999-01-01'
            JOIN employees as e 
                ON e.emp_no = dm.emp_no";

    $data = mysqli_query($db, $sql);
    $tab = array();
    while ($line = mysqli_fetch_assoc($data)){
        $tab[] = array(
            'id' => $line['id'],
            'name' => $line['nom_departement'],
            'manager' => $line['manager'] ?? null
        );
    }

    return $tab;
}

function getDeptName($idDept){
    $db = getDB();

    $sql = "SELECT dept_name as nom FROM departments as d WHERE dept_no = '$idDept'";
    $result = mysqli_query($db, $sql);
    if ($line = mysqli_fetch_assoc($result)){
        return $line['nom'];
    }

    return null;
}

function getAllEmployesFrom($id_dept){
    $db = getDB();

    $sql = 
        "SELECT 
            CONCAT(e.first_name, ' ', e.last_name) AS employe
        FROM dept_emp as de
            JOIN employees as e ON e.emp_no = de.emp_no
        WHERE de.dept_no = '$id_dept'";

    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $data;
}


?>