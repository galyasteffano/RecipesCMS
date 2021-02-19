<?php
    
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB("db_recipes_bg");
    

    if($_SERVER['REQUEST_METHOD']=='POST'){
       if (isset($_POST['submit'])) {
           $ingredient=$_POST['ingredient'];
           $qry=insertItem($ingredient, 'name', 'tbl_ingredients');
           if (!$qry) {
               redirectTo('0');
           } else {
               redirectTo('1');
           }  //1 means the query was inserted successfully
       }
    }

?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>добави съставка</title>
</head>
<body>
    <form action="add.php" method="post" novalidate>
        <h2>добави съставка</h2>
        <label for="ingredient">име на съставка:</label>
        <input type="text" name="ingredient">
        <button type="submit">добави</button>
     <br />
     </form> 
     <a href="index.php">home</a>
</body>
</html>