<?php 
   
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB("db_recipes_bg");
    
   if($_SERVER['REQUEST_METHOD']=='POST'){
        $qty=$_POST['quantity_name'];
        $tbl_name="tbl_quantities";

        // $msql="INSERT INTO ".$tbl_name." ("."name".") ";
        // $msql.="VALUES ("."'".$qty."'".");";
        // $qry=mysqli_query($link,$msql);
        $qry=insertItem($qty,'tbl_quantities');
        if(!$qry)
            echo $msql;
        else
            header("Location: ../message.php?msg=1"); 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>добави</title>
</head>
<body>
    <form action="add.php" method="post" novalidate>
        <h2>добави количесво</h2>
        <label for="quantity_name">име:</label>
        <input type="text" name="quantity_name">
        <button type="submit">добави</button>
     <br />
    </form> 
     <a href="index.php">home</a>
</body>
</html>