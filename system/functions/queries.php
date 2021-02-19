<?php
    function getSingleItemByID($item,$tbl_name,$id){
      global $link;
      $sql="SELECT ".$item." FROM ".$tbl_name;
      $sql.=" WHERE id=".$id;
      return mysqli_query($link,$sql);
    }

    function getSingleItem($item,$tbl,$col_id,$item_id){
      global $link;
      $sql="SELECT ".$item." FROM ".$tbl;
      $sql.=" WHERE ".$col_id." = ".$item_id;
      return mysqli_query($link,$sql);
    }

    function deleteItem($tbl_name,$col_id,$id){
      global $link;
      $mysql="DELETE FROM ".$tbl_name;
      $mysql.=" WHERE ".$col_id." = "."'".$id."'";
      $mysql.=" LIMIT 1";
      $qry=mysqli_query($link,$mysql);
      return $qry;
    }
    

    function updateValue($value,$new_value,$tbl_name,$col_id,$id){
      global $link;
      $mysql="UPDATE ".$tbl_name;
      $mysql.=" SET ".$value." = "."'".$new_value."'";
      $mysql.=" WHERE ".$col_id." = ".$id.";";
      return mysqli_query($link,$mysql);
    }

    function insertItem($item,$col_name,$tbl_name){
      global $link;
      $mysql="INSERT INTO ".$tbl_name." ( ".$col_name." ) ";
      $mysql.="VALUES ("."'".$item."'".");";
      $qry= mysqli_query($link,$mysql);
      return $qry;
    }

    function getAllItems($tbl_name){
      global $link;
      $mysql="SELECT * FROM ".$tbl_name.";";
      return mysqli_query($link,$mysql);
    }

    function getAllItemsOrderDes($order,$tbl){
      global $link;
      $mysql="SELECT * FROM ".$tbl; 
      $mysql.=" ORDER BY ".$order;
      $mysql.=" DESC LIMIT 0,1";
      //return $mysql;
      return mysqli_query($link,$mysql);
    }

    function redirectTo($code){
      header("Location: /myRecipesNotebook/system/admin/message.php?msg=".$code); 
    }
    
    function listAllRecipes(){
      global $link;
      $sql_recipe= "SELECT ingredient_name,num,num_whole,num_part,quantity_name";
      $sql_recipe.=" FROM tbl_recipe recipe";
      $sql_recipe.=" JOIN tbl_ingredient ingredients ON recipe.fk_ingredient=ingredients.ingredient_id";
      $sql_recipe.=" JOIN tbl_quantity qty ON recipe.fk_qty = qty.quantity_id";

      return mysqli_query($link,$sql_recipe);
    }

    function saveIngredients($recipe_id){
      global $link;
      global $recipe;

      $sql="INSERT INTO tbl_recipe (recipe_name_fk,fk_ingredient,fk_qty,num,  num_whole,num_part)";
			$sql.="VALUES(";
			$sql.="'".$recipe_id."',";
			$sql.="'".$recipe['ingredient_id']."',";
			$sql.="'".$recipe['measure_type']."',";
			$sql.="'".$recipe['q_num']."',";
			$sql.="'".$recipe['q_whole']."',";
			$sql.="'".$recipe['q_part']."'";
			$sql.=");";
      if(!mysqli_query($link,$sql))
        return false;
      else
        return true;
    }

    function saveRecipe($recipe_id){
      global $link;
      global $recipe;

      $recipe_directions="INSERT INTO tbl_recipe_directions ";
			$recipe_directions.="(";
			$recipe_directions.="fk_recipe,steps";
			$recipe_directions.=")";
			$recipe_directions.="VALUES (";
			$recipe_directions.="'".$recipe_id."',";
			$recipe_directions.="'".$recipe['directions']."'";
			$recipe_directions.=");";
      return $recipe_directions;

    }

?>