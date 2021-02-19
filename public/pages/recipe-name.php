<?php
    require_once('../../system/initialize/config.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
    $link=connectToDB('db_recipes');
    session_start();


    if($_SERVER['REQUEST_METHOD']=='POST'){
        global $recipe;
		$recipe['name']=$_POST['recipe-name']; 
        $_SESSION['recipe_name']=$_POST['recipe-name']; 
        if(isset($_POST['btn_submit'])){
           
            $sql="INSERT INTO tbl_recipe_names (recipe_name) ";
            $sql.=" VALUES ("."'".$recipe['name']."'";
            $sql.=");";
            if(!mysqli_query($link,$sql)){
                var_dump($sql);
            }
            else{
                header("Location: recipe-details.php?name=".$recipe['name']);
            }
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Galya Paneva">
	<link  href="../../private/assets/stylesheets/style.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="../../private/assets/scripts/scripts.js"></script>
    <title>Name</title>
</head>
<body>
    <form action="recipe-name.php" method="post">
        <div class="form-section">
			<label for="recipe-name">Recipe name: </label>
			<input type="text" name="recipe-name" required>
			<button type="submit" class="add" name="btn_submit" value="add-recipe-name">+</button>
		</div>
    </form>
</body>
</html>