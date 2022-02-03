<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en php</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>
    <br>
    <div class="container">
    <br>
    <div class="row">
    <br>
    <h2>Crud en PHP</h2>
    <p>
    </div>
    <p>
    <br>
    <div class="row">
    <a href="add.php" class="btn btn-success">Ajouter un user</a>
    <br>
    <div class="table-responsive">
    <br>   
    <table class="table table-hover table-bordered">
    <br>
    <thead>

  <th>Name</th>
  <p>

  <th>Fristname</th>
  <p>
  <th>Age</th>
<p>



<th>Tel</th>
<p>



<th>Pays</th>
<p>



<th>Email</th>
<p>



<th>Comment</th>
<p>



<th>metier</th>
<p>



<th>Url</th>
<p>



<th>Edition</th>
<p>

</thead>
<p>

<br>
<tbody><?php include 'database.php'; 
//on inclut notre fichier de connection 
$pdo = Database::connect(); 
//on se connecte à la base 
$sql = 'SELECT * FROM user ORDER BY id DESC'; 
//on formule notre requete 
foreach ($pdo->query($sql) as $row) { 
    //on cree les lignes du tableau avec chaque valeur retournée
                            echo '


</body>
</html>