<?php 
    require_once('../../../system/initialize/init.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes_bg');

    $list_ingredients=getAllItems('tbl_ingredients');
    $list_qty=getAllItems('tbl_quantities');
    
?>


<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/fa3d37e371.js"></script>
    <title>Main Admin Portal</title>
</head>
<body>

    <table>
          <tr>
            <td> Списък със съставки </td>
            <td><a href="ingredients/add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td> 
          </tr>
        <?php while($i_result=mysqli_fetch_assoc($list_ingredients)) {?>
        <tr>
            <td><?php echo $i_result['name'];?></td>    
             
            <td><a href="<?php echo 'ingredients/delete.php?id='.$i_result['id'];?>"><i class="fa fa-minus-circle" aria-hidden="true"></i> </a></td>
            <td><a href="<?php echo 'ingredients/update.php?id='.$i_result['id'];?>""><i class="fa fa-pencil-square" aria-hidden="true"></i> </a></td>
        </tr>
        <?php };?>
    </table>
    <table>
        <tr>
            <td>Количества</td>
            <td><a href="quantities/add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td> 
        </tr>
        <?php while ($q_result=mysqli_fetch_assoc($list_qty)) { ?>
        <tr>
            <td><?php echo $q_result['name'];?></td>
            <td><a href="<?php echo 'quantities/delete.php?id='.$q_result['id'];?>"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
            <td><a href="<?php echo 'quantities/update.php?id='.$q_result['id'];?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
        </tr>
        <?php };?>
    </table>
    <a href="../index.php">Main Portal</a>
</body>
</html>