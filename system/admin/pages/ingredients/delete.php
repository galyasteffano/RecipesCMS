<?php 
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link= connectToDB('db_recipes');
    $id=$_GET['id'];

    $del=getSingleItem('ingredient_name','tbl_ingredient','ingredient_id',$id);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['delete_btn']==='cancel')
            header("Location: /myRecipesNotebook/system/admin/pages/index.php");
        else if($_POST['delete_btn']==='delete'){
            $removeit=deleteItem('tbl_ingredient','ingredient_id',$id);
            if(!$removeit)
                redirectTo('0');
            redirectTo('1');    
        }    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/fa3d37e371.js"></script>
    <title>remove ingredient</title>
</head>
<body>
    <form action="<?php echo 'delete.php?id='.$id;?>" method="post">
    <?php $todel=mysqli_fetch_assoc($del); ?>
        <dt>Deleteing  <strong><?php echo $todel['ingredient_name'];?></strong> </dt>
        <br>
        <button type="submit" name="delete_btn" value="delete">Yes</button>
        <button type="submit" name="delete_btn" value="cancel">No changed my mind</button>
        
    </form>
    <a href="../index.php">Home button</a>
    
    <a href="/myRecipesNotebook/system/admin/pages/index.php">test</a>
</body>
</html>