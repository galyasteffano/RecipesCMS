<?php
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes_bg');

    $qry=getSingleItemByID('name','tbl_quantities',$id);
    if(!$qry)
        header("Location: ../message.php?msg=0");
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['update_btn']==='cancel')
            header("Location: ../index.php");
        else if($_POST['update_btn']==='update'){
             $new_value=$_POST['new-value'];
        
            $qry=updateValue('name',$new_value,'tbl_quantities',$id);
       
            if(!$qry){
                var_dump($msql);
                header("Location: ../message.php?msg=0");
            }
            header("Location: ../index.php");

        }
        
    }
?>


<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Галя Панева">
    <title>Промени</title>
</head>
<body>
<?php $qty_update=mysqli_fetch_assoc($qry);  #var_dump($qty_update); ?>
    <h3>Промени количество</h3>
    <form action="<?php echo 'update.php?id='.$id;?>" method="post">
        <input type="text" name="new-value" value="<?php echo $qty_update['name']; ?>">
        <button type="submit" name="update_btn" value="update">Да</button>
        <button type="submit" name="update_btn" value="cancel">Откажи</button>
    </form>

    <a href="index.php">home</a>
</body>
</html>