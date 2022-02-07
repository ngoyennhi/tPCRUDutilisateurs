<?php
//l’appel à la base
require 'database.php';
// traiter et sécuriser
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    //on initialise nos messages d'erreurs;
    $nameError = '';
    $firstnameError = '';
    $ageError = '';
    $telError = '';
    $emailError = '';
    $paysError = '';
    $commentError = '';
    $metierError = '';
    $urlError = '';
    // on recupère nos valeurs 
    $name = htmlentities(trim($_POST['Name'])); 
    $firstname=htmlentities(trim($_POST['Firstname'])); 
    $age = htmlentities(trim($_POST['Age'])); 
    $tel=htmlentities(trim($_POST['Tel'])); 
    $email = htmlentities(trim($_POST['Email'])); 
    $pays=htmlentities(trim($_POST['Pays'])); 
    $comment=htmlentities(trim($_POST['Comment'])); 
    $metier=htmlentities(trim($_POST['Metier'])); 
    $url=htmlentities(trim($_POST['Url'])); 
    // on vérifie nos champs $valid = true; 
    if (empty($name)){ 
        $nameError = 'Please enter Name'; 
        $valid = false; 
    } 
    else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
        echo $nameError = "Only letters and white space allowed"; 
        $valid = false; 
    } else if( strlen($name) > 250){
        echo $nameError = "Your name is too long"; 
        $valid = false;
    } else {
        $valid = true;
    }
    ;
    if (empty($firstname)){ 
        $firstnameError ='Please enter firstname'; 
        $valid= false; }
    else if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
         echo $firstnameError = "Only letters and white space allowed"; 
         $valid = false;
        } else {
            $valid = true;
        };
    if (empty($age)){ 
        $ageError = 'Please enter your age';
        $valid = false;
    } 
    else if ($age >120){
        echo $ageError = 'Please enter a valid age! your age is too old';
        $valid = false;}
        else {
            $valid = true; };

   if (empty($tel)) { 
       $telError = 'Please enter phone'; 
       $valid = false; }
    else if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$tel)){ 
        $telError = 'Please enter a valid phone'; 
        $valid = false; }         else {
            $valid = true; };

   if (empty($email)) { 
       $emailError = 'Please enter Email Address'; 
       $valid = false; } 
       else if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) { 
           $emailError = 'Please enter a valid Email Address'; 
           $valid = false; } else {
            $valid = true; };
    // if (empty($pays)) { 
    //     $paysError = 'Please select a country'; 
    //     $valid = false; } 
    // // if (!isset($pays)) { $paysError = 'Please select a country'; $valid = false; } 
    // if(empty($comment)){ 
    //     $commentError ='Please enter a description'; 
    //     $valid= false; } 
    // if(empty($metier)){ 
    //     $metierError ='Please select a job'; 
    //     $valid= false; } ;
    // if (empty($url)){ 
    //     $urlError ='Please enter website url'; 
    //     $valid= false; } 
    // else if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) { 
    //     $urlError='Enter a valid url'; 
    //     $valid=false; } ;

    // si les données sont présentes et bonnes, on se connecte à la base 
    if ($valid) { 
        $pdo = Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user(Name,Firstname,Age,Tel,Email) values(?, ?, ?, ? , ? )";
        $q = $pdo->prepare($sql);
        $q->execute([
        $name,
        $firstname,
        $age,
        $tel,
        $email,
        $pays,
        $comment,
        $metier,
        $url,
    ]);
    Database::disconnect();
    header('Location: index.php');
} else {
    show_404();
}
}
// //connexion la BDD
// include('connexion.php');

// //On insere les données reçues
// $sth = $conn->prepare("
// INSERT INTO comment(pseudo, comment)
// VALUES(:pseudo, :comment)");
// $sth->bindParam(':pseudo',$nom);
// $sth->bindParam(':comment',$com);
// $sth->execute();
// //On renvoie l'utilisateur vers la page de remerciement
// header("Location:form-merci.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD an user</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Ajouter un contact</h3>
            <form action="add.php" method="post">
            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
            <label class="control-label">Name</label>    
        </div>
            </form>
        </div>
    </div>
</body>
</html>