<?php
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes');
    $id=$_GET['id'];

    $result=getSingleItem('quantity_name','tbl_quantity','quantity_id',$id);


    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['update_btn']==='cancel')
            header("Location: ../index.php");
         else if($_POST['update_btn']==='update'){
            $new_value=$_POST['new-value'];
            $updated=updateValue('quantity_name',$new_value,'tbl_quantity','quantity_id',$id);
            if(!$updated)
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
    <title>Update an item</title>
</head>
<body>
<?php $data=mysqli_fetch_assoc($result); ?>
    <h2>update an item </h2>
    <form action="<?php echo 'update.php?id='.$id; ?>" method="post"> 
        <input type="text" name="new-value" value="<?php echo $data['quantity_name']; ?>"> 
        <button type="submit" name="update_btn" value="update">Yes</button>
        <button type="submit" name="update_btn" value="cancel">No</button>
    </form>
</body>
</html>