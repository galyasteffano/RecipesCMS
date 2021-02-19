<?php
    require_once('../../system/initialize/config.php');
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $recipe_id='';
    $db_name="db_recipes";
    $recipe_id=$_GET['id'];

    $link=mysqli_connect("localhost","root","",$db_name); //lets connect to db
    if(mysqli_connect_errno()){
        echo "Database connection failed ".mysqli_connect_errno();
        mysqli_close($link);
        exit;
    }
    $msql="SELECT * FROM tbl_recipe_names WHERE recipe_name_id=".$recipe_id;
    if(!$recipe_name_qry=mysqli_query($link,$msql))
        echo $msql;
    $recipe_name=mysqli_fetch_assoc($recipe_name_qry);
//&frac
    $sql_recipe= "SELECT ingredient_name,num,num_whole,num_part,quantity_name";
    $sql_recipe.=" FROM tbl_recipe recipe";
    $sql_recipe.=" JOIN tbl_ingredient ingredients ON recipe.fk_ingredient=ingredients.ingredient_id";
    $sql_recipe.=" JOIN tbl_quantity qty ON recipe.fk_qty = qty.quantity_id";
    $sql_recipe.=" WHERE recipe.recipe_name_fk=".$recipe_id;
    if(!$result_sql_recipe=mysqli_query($link,$sql_recipe)) 
        var_dump($sql_recipe);


    $sql_dir="SELECT steps FROM tbl_recipe_directions WHERE fk_recipe=".$recipe_id;
    if(!$result_sql_dir=mysqli_query($link,$sql_dir))
        var_dump($sql_dir);         //if mysqli fails, print the query for debugging
    $directions=mysqli_fetch_assoc($result_sql_dir);        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Galya Paneva">
    <link  href="../../private/assets/stylesheets/style.css" rel="stylesheet" type="text/css" media="all">
    <script src="../../private/assets/scripts/scripts.js" type="text/javascript" ></script>
    <title><?php echo $recipe_name['recipe_name'];?></title>
</head>
<body>
 <header>
    <nav><li><a href="../index.php">View all recipes</a></li></nav>
 </header>
    <h3><?php echo $recipe_name['recipe_name'];?></h3>
       <?php 
        while ($recipe_details=mysqli_fetch_assoc($result_sql_recipe)) {
        ?>        
            <dd><?php echo $recipe_details['num'], $recipe_details['num_whole'],
             $recipe_details['num_part'],str_repeat('&nbsp;', 3),$recipe_details['quantity_name'], str_repeat('&nbsp;', 3), $recipe_details['ingredient_name'];?>
            </dd>
  
           
     <?php }?>       
            <dt>Directions</dt>
            <dd><?php echo $directions['steps'];?></dd>
        </dl>

</body>
</html>