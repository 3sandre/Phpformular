<?php require_once("Connection.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>doc</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
   <h3>Modification</h3>
   <form method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">

        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>

        <label for="priority">Priority</label>
        <select id="priority" name="priority">
            <option value="1">Low</option>
            <option value="2" selected>Meduim</option>
            <option value="3">High</option>
        </select>

       <fieldset>
           <legend>Type</legend>
        <label>
            <input type="radio" name="type" value="1" checked>
            Complaint
        </label>
        <br>
        <label>
            <input type="radio" name="type" value="2">
            Suggestion
        </label>
       </fieldset>
       <label>
        <input type="checkbox" name="terms">
        I agree to the terms and conditions
       </label>
       
       <br>

       <button name="update">Update</button>
    </form>
    <?php

if(isset($_GET["Id"]))
{
$name = $_POST["name"];
$message = $_POST["message"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);

    $Id=$_GET["Id"];
    $req=$conn->query("UPDATE  message SET name='$name',body='$message',priority='$priority' WHERE id=$Id"); 
    if($req){
        echo "Modification Réussie";
        echo " <br> <br> <a href=\"landing.php\" > Affichage </a>";
    }
    }
?>

</body>
</html>