
<?php
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link= connectToDB('db_recipes');
    $id=$_GET['id'];

    $del=getSingleItem('quantity_name','tbl_quantity','quantity_id',$id);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['delete_btn']==='cancel')
            header("Location: /myRecipesNotebook/system/admin/pages/index.php");
        else if($_POST['delete_btn']==='delete'){
            $removeit=deleteItem('tbl_quantity','quantity_id',$id);
            if(!$removeit)
                redirectTo('0');
            redirectTo('1');    
        }    
    }
    if(isset($link)){
        mysqli_close($link);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Galya Paneva">
	<script type="text/javascript" src="../private/scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="../private/style.css">
    <title>Delete an item</title>
</head>
<body>
<?php $data=mysqli_fetch_assoc($del); ?>
    <h2>Delete an item </h2>
    <form action="<?php echo 'delete.php?id='.$id; ?>" method="post"> 
        <dt>You are about to delete <b> <?php echo $data['quantity_name'];?> </b></dt>
        <button type="submit" name="delete_btn" value="delete">Yes</button>
        <button type="submit" name="delete_btn" value="cancel">No</button>
    </form>
</body>
</html>