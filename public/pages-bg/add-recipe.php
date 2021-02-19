<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../../system/scripts/scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="../../system/stylesheets/style.css">
    <title>добави рецепта</title>
</head>
<body>
<header>
    <nav>
        <li><a href="../../index.php">Home</a></li>
    </nav>
</header>

    <h2>Добави нова рецепта</h2>
    <form action="add-recipe.php" method="post" class="form-recipe" novalidate>
        <label for="recipe-name">име на рецепта: </label>
		<input type="text" name="recipe-name" required>
		<button class="add" name="btn_add" value="add-recipe-name">+</button>
        <br />
		<label for="ingredient">съставки: </label>
		<select name="ingredient-0" class="ingredient-style">
		<option value="">лист със съставки</option>
		<?php # while ($i_result=mysqli_fetch_assoc($ingredient_result)){  ?>	
		<option value="<?php #echo $i_result['ingredient_id']?>"><?php #echo $i_result['ingredient_name'];?>
		</option>		
		<?php # }; ?>	
        </select>
		<label for="qty">количество</label>
		<input type="number" name="qty-whole-num-0" class="qty-style">
		<input type="number" name="qty-whole-0" class="qty-style">
		<input type="number" name="qty-half-0" class="qty-style">
		<select class="unit-style" name="unit-0">
			<option value="">мерна единица</option>
			<?php  #while ($qty_result= mysqli_fetch_assoc($result)){  ?>				
			<option value="<?php #echo $qty_result['quantity_id']; ?>"><?php # echo $qty_result['quantity_name']; ?></option>
			<?php #	};?>		
			</select>
		<button class="add" name="btn_add" value="add-ingredinets">+</button>
		<br /> <br />
		<label for="prep-steps">начин на приготвяне</label>
		<textarea name="prep-steps" id="prep-style" cols="50" rows="11"></textarea>
		
    <button type="submit" value="submit-recipe">добави</button>
    </form>
 <footer><?php echo date('Y');?>&copy;</footer>   
</body>
</html>