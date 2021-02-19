<?php
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes_bg');
    $id=$_GET['id'];
    $result=getSingleItemByID('name','tbl_ingredients',$id);
    if(!$result)    //reminder: think of better way to check if qry is failed
        var_dump($result);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['update_btn']==='cancel')
            header("Location: ../message.php?msg=0");
        else if($_POST['update_btn']==='update'){
            $new_value=$_POST['new-value'];
            $qry=updateValue('name',$new_value,'tbl_ingredients',$id);
       
            if(!$qry){
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
    <meat name="author" content="Галя Панева">
    <title>промени съставка</title>
</head>
<body>
    <h3>промени съставка</h3>
    <?php $i_result=mysqli_fetch_assoc($result); ?>
    <form action="<?php echo 'update.php?id='.$id; ?>" method="post">
        <input type="text" name="new-value" value="<?php echo $i_result['name'];?>">
        <button type="submit" name="update_btn" value="update">да</button>
        <button type="submit" name="update_btn" value="cancel">не</button>
    </form>

    <a href="index.php">home</a>
</body>
</html>