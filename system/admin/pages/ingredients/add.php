
<?php

    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB("db_recipes");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $new_item=$_POST['add-item'];
       if ($_POST['submit']==='add') {
           $result=insertItem($new_item,'ingredient_name','tbl_ingredient');
           if (!$result) {
               redirectTo('0');
           }  //should be response code here
           redirectTo('1');
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Galya Paneva">
	<script type="text/javascript" src="../private/scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="../private/style.css">
    <title>Add Item</title>
</head>
<body>
    <form action="add.php" method="post">
        <h3>Add item</h3>
     
        <label for="add-item">Name of item</label><br>
        <input type="text" name="add-item"><br>
        <button type="submit" name="submit" value="add">Add</button>
    </form>    
</body>
</html>