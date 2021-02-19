<?php
    require_once('../../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes_bg');
    $id=$_GET['id'];

    $qry=getSingleItemByID('name','tbl_quantities',$id);
    if(!$qry)
        var_dump($msql);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['delete_btn']==='cancel')
            header("Location: ../index.php");
        else if($_POST['delete_btn']==='delete'){
            $msql="DELETE FROM tbl_quantities ";
            $msql.="WHERE id="."'".$id."'";
            $msql.=" LIMIT 1";
            $qry=mysqli_query($link,$msql);
            if(!$qry)
                header("Localation: ../message.php?msg=0");
            header("Location: ../message.php?msg=1");
        }    
    }    

?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Галя Панева">
    <title>Изтрий</title>
</head>
<body>
<?php $qty=mysqli_fetch_assoc($qry);?>
    <h3> Изтрий количество</h3>

    <form action="<?php echo 'delete.php?id='.$id; ?>" method="post">
        <dt>Изтриване на <b> <?php echo $qty['name']; ?> </b> </dt>
        <br />
        <button type="submit" name="delete_btn" value="delete">Да</button>
        <button type="submit" name="delete_btn" value="cancel">Не</button>
    </form>
    <a href="index.php">home</a>
</body>
</html>