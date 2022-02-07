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
    } ;
    if (empty($firstname)){ 
        $firstnameError ='Please enter firstname'; 
        $valid= false; }
    else if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
         echo $firstnameError = "Only letters and white space allowed"; 
        };
    if (empty($age)){ 
        $ageError = 'Please enter your age';
        $valid = false;
    } 
    else if ($age >120){
        echo $ageError = 'Please enter a valid age! your age is too old';
    }; 
   if (empty($tel)) { 
       $telError = 'Please enter phone'; 
       $valid = false; }
    else if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$tel)){ 
        $telError = 'Please enter a valid phone'; 
        $valid = false; } ; 
   if (empty($email)) { 
       $emailError = 'Please enter Email Address'; 
       $valid = false; } 
       else if (!filter_var($email,FILTER_VALIDATE_EMAIL) ) { 
           $emailError = 'Please enter a valid Email Address'; 
           $valid = false; } ;
    if (empty($pays)) { 
        $paysError = 'Please select a country'; 
        $valid = false; } 
    // if (!isset($pays)) { $paysError = 'Please select a country'; $valid = false; } 
    if(empty($comment)){ 
        $commentError ='Please enter a description'; 
        $valid= false; } 
    if(empty($metier)){ 
        $metierError ='Please select a job'; 
        $valid= false; } ;
    if (empty($url)){ 
        $urlError ='Please enter website url'; 
        $valid= false; } 
    else if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) { 
        $urlError='Enter a valid url'; 
        $valid=false; } ;
    // si les données sont présentes et bonnes, on se connecte à la base 
    if ($valid) { 
        $pdo = Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user(Name,Firstname,Age,Tel,Email,Pays,Comment,Metier,Url) values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
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
}