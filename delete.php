<?php
require_once("Connection.php");

if(isset($_GET["Id"]))
{
    $Id=$_GET["Id"];
    $read=$conn->prepare("DELETE FROM message WHERE Id= ?");
    $read->execute(array($Id));
    if($read)
    {
        echo "Suppression des informations avec succès";
    }
}

?>
<?php
      require_once("Connection.php");
      ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  table{
    border: solid 1px;
    width: 80%;
  }
  th,td{
    border: solid 1px;

  }
</style>
<body>
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Body</th>
        <th>Priority</th>
        <th>Type</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>

      <?php
      // $read=$conn->query("SELECT * FROM message");
      // while ($all=$read->fetch_assoc())
      $req="SELECT * FROM message";
      $resultat= mysqli_query($conn,$req);    
      while($all= mysqli_fetch_assoc($resultat)) {
      ?>
      
      <tr>
        <td> <?php echo $all["id"]; ?> </td>
        <td> <?php echo $all["name"]; ?> </td>
        <td> <?php echo $all["body"]; ?> </td>
        <td> <?php echo $all["priority"]; ?> </td>
        <td> <?php echo $all["type"]; ?> </td>
        <td><a href="update.php?Id= <?php echo $all["id"] ?> "><i class="fa-solid fa-file-pen"></i></a></td>
        <td><a href="delete.php?Id= <?php echo $all["id"] ?> "><i class="fa-solid fa-delete-left"></i></a></td>
      </tr>
     <?php } ?>
    </table>
      
</body>
</html>
