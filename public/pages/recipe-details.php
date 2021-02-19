<?php
    require_once('../../system/initialize/config.php');
    require_once(ADMIN_PATH.'/functions/queries.php');
	session_start();
    $r_name=$_SESSION['recipe_name'];


    $link=connectToDB('db_recipes');
	$result=getAllItems('tbl_quantity');
	$ingredient_result=getAllItems('tbl_ingredient');

    if ($_SERVER['REQUEST_METHOD']=='POST') {
		//fix this!!

		$recipe['name']= $r_name;  //$_POST['recipe-name'];  //store recipe name
		$recipe['measure_unit']=$_POST['unit-0'];
		$recipe['ingredient_id']=intval($_POST['ingredient-0']);
		$recipe['q_num']=intval($_POST['qty-whole-num-0']);
		$recipe['q_whole']=intval($_POST['qty-whole-0']);
		$recipe['q_part']=intval($_POST['qty-half-0']);
		$recipe['measure_type']=intval($_POST['unit-0']);
		$recipe['images']="";
		$recipe['comments']="";
		$recipe['directions']=$_POST['prep-steps'];

		$sql_recipe_name=getAllItemsOrderDes('recipe_name_id','tbl_recipe_names'); //get the last 

		if($_POST['btn_add']==='add_ingredients'){
			$recipe_name=mysqli_fetch_assoc($sql_recipe_name);
			$recipe_id=intval($recipe_name['recipe_name_id']);
			if(saveIngredients($recipe_id))
				echo "Ingredients added!";	
		}
		else if($_POST['btn_add']==='submit'){
		
			$qry=getAllItemsOrderDes('recipe_name_id','tbl_recipe_names');
			$recipe_name=mysqli_fetch_assoc($qry);
			$recipe_id=intval($recipe_name['recipe_name_id']);
		
			if(mysqli_query($link,saveRecipe($recipe_id))) //todo: write try catch here and remove var_dump
				header("Location:../index.php");
		}
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="author" content="Galya Paneva">
	<link  href="../../private/assets/stylesheets/style.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="../../private/assets/scripts/scripts.js"></script>
	<title>Add New Recipe Details</title>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">tbd</a></li>
			</ul>
		</nav>
	</header>
        <h1><?php echo $r_name;?></h1>
	    <form action="recipe-details.php" method="post" class="form-recipe" novalidate>
		   <label for="ingredient">ingredient: </label>
					<!-- <input type="text" name="ingredient-0" class="ingredient-style"> -->
			    <select name="ingredient-0" class="ingredient-style">
				    <option value="">ingredients list</option>
			<?php while ($i_result=mysqli_fetch_assoc($ingredient_result)){  ?>	
				    <option value="<?php echo $i_result['ingredient_id']?>"><?php echo $i_result['ingredient_name'];?></option>		
			<?php }; ?>	
				</select>
				<label for="qty">quantity</label>
				<input type="number" name="qty-whole-num-0" class="qty-style">
				<input type="number" name="qty-whole-0" class="qty-style">
				<input type="number" name="qty-half-0" class="qty-style">
					<!-- 1<sup>1</sup>&frasl;<sub>2</sub> -->
				<select class="unit-style" name="unit-0">
					<option value="">Measuring unit</option>
			<?php  while ($qty_result= mysqli_fetch_assoc($result)){  ?>				
					<option value="<?php echo $qty_result['quantity_id']; ?>"><?php echo $qty_result['quantity_name']; ?></option>
			<?php 	};?>		
				</select>
				<button type="submit" name="btn_add" value="add_ingredients">+</button>
			    <br> <br>
				<label for="prep-steps">directions</label>
				<textarea name="prep-steps" id="prep-style" cols="50" rows="11"></textarea>
			    
				     
				<button type="submit" name="btn_add" value="submit">add recipe</button>
      		
            </form>    
         <footer><?php echo date('Y');?>&copy;</footer>
    </body>
</html>            
