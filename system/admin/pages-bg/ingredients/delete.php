<?php
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes_bg');
    
    $id=$_GET['id'];

    $qry=getSingleItemByID('name','tbl_ingredients',$id);
    if(!$qry)
        var_dump($qry);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['delete_btn']==='cancel')
            header("Location: ../index.php");
        else if($_POST['delete_btn']==='delete'){
           $result=deleteItem('tbl_ingredients','id',$id);
            if(!$result)    //if the query fails redirect with failed message
                redirectTo('0');
            redirectTo('1'); 
        }    
    }


?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/fa3d37e371.js"></script>
    <title>премахни съставка</title>
</head>
<body>
<?php $ing=mysqli_fetch_assoc($qry);  ?>
    <h3>премахни съставка</h3>
    <form action="<?php echo 'delete.php?id='.$id;?>" method="post">
        <dt> Изтриване на  <b> <?php echo $ing['name']; ?> </b> </dt>
        <br>
        <button type="submit" name="delete_btn" value="delete">Да</button>
        <button type="submit" name="delete_btn" value="cancel">Не</button>
    </form>
    <a href="index.php">home</a>
</body>
</html>