<?php ini_set('display_errors', 'on'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud en php</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>
  <div class="container">
    <div class="row">
    <h2>Crud en Php</h2>
    </div>
    <div class="row">
    <a href="add.php" class="btn btn-success">Ajouter un user</a>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-bordered ">
        <thead>
          <th>Name</th>
          <th>Firstname</th>
          <th>Age</th>
          <th>Tel</th>
          <th>Pays</th>
          <th>Email</th>
          <th>Comment</th>
          <th>Metier</th>
          <th>Url</th>
          <th>Edition</th>
        </thead>
        <tbody>
        <?php include 'database.php'; 
        //on inclut notre fichier de connection 
        $pdo = new Database();
        $pdo->connect(); 
        //on se connecte à la base 
        $sql = 'SELECT * FROM user ORDER BY id DESC'; 
        //on formule notre requete 
        foreach ($pdo->query($sql) as $row) { 
          //on cree les lignes du tableau avec chaque valeur retournée 
          echo '<tr>';
          echo '<td>'.$row['name'].'</td>';
          echo '<td>'.$row['firstname'].'</td>';
          echo '<td>'.$row['age'].'</td>';
          echo '<td>'.$row['tel'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$row['pays'].'</td>';
          echo '<td>'.$row['comment'].'</td>';
          echo '<td>'.$row['metier'].'</td>';
          echo '<td>'.$row['url'].'</td>';
          // un autre td pour le bouton d'edition
          echo '<td>'.'<a class="btn" href="edit.php?id='.$row['id'].'">Read</a>';
          // un autre td pour le bouton d'update
          echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
          // un autre td pour le bouton de suppression
          echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';}

          $pdo->disconnect();
        ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>