

<?php 
    var_dump($_GET);
    $code=$_GET['msg'];     //store message into code variable
    $response='';
    if($code==='1'){
        $response="Item was inserted successfully";
    } 
    else if($code==='0'){
        $response="Error: item was not added in the table";
    }
    echo "Code is: ". $code."<br />";
    echo "response is: ".$response;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>
<body>
  <h2><?php echo $response; ?></h2>
    <!-- todo: some kind of delayed redirect to the message can be displayed before redirecting the user -->
    <a href="/myRecipesNotebook/system/admin/pages-bg/index.php">Fake redirect</a>
    <a href="/myRecipesNotebook/system/admin/pages/index.php">Fake redirect 1</a>
</body>
</html>