<?php
    require_once('../system/initialize/config.php');
    require_once(ADMIN_PATH.'/functions/queries.php');

    $link=connectToDB('db_recipes');
    $recipe_name_qry=getAllItems('tbl_recipe_names');

  /* 
  SELECT fk_ingredient,ingredient_name,fk_qty,num,num_whole,num_part,quantity_name 
FROM tbl_recipe recipe
JOIN tbl_ingredient ing ON recipe.fk_ingredient = ing.ingredient_id
JOIN tbl_quantity qty ON recipe.fk_qty = qty.quantity_id
 */  

//   $sql_recipe= "SELECT ingredient_name,num,num_whole,num_part,quantity_name";
//   $sql_recipe.=" FROM tbl_recipe recipe";
//   $sql_recipe.=" JOIN tbl_ingredient ingredients ON recipe.fk_ingredient=ingredients.ingredient_id";
//   $sql_recipe.=" JOIN tbl_quantity qty ON recipe.fk_qty = qty.quantity_id";
//   if(!$result_sql_recipe=mysqli_query($link,$sql_recipe)) 
//     var_dump($sql_recipe);
    $list_recipes=listAllRecipes();   //not sure i need this

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <link  href="../private/assets/stylesheets/style.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="../private/assets/scripts/scripts.js"></script>
	<meta name="author" content="Galya Paneva">
	<title>electronic notebook for recipes</title>
</head>
<header>
<!-- <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div> -->

</header>
<body>
    <div class="banner">
        <h2> TO DO: list all recipes here</h2>
        <ul>
            <li><a href="../public/pages/recipe-name.php">add a new recipe</a></li>
        </ul>
    </div>
  
    
    <div>
    <?php 
       while ($recipe_name=mysqli_fetch_assoc($recipe_name_qry)) {
    ?>
        <h4><li><a href="pages/recipe.php?id=<?php echo $recipe_name['recipe_name_id']; ?>"><?php echo $recipe_name['recipe_name']; ?></a></li></h4>
     <?php  };?>
    </div>
</body>
 <footer>
     <p>Footer</p>
 </footer>
</html>