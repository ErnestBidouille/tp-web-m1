<?php
include('../templates/bdd.php');


$req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, adresse, date_de_naissance, parcours, note_maths, note_informatique, note_anglais, moyenne) VALUES(:nom, :prenom, :adresse, :date_de_naissance, :parcours, :note_maths, :note_informatique, :note_anglais, :moyenne)');

$req = $bdd->prepare('UPDATE etudiant SET nom = :nom, prenom = :prenom, adresse=:adresse, date_de_naissance = :date_de_naissance, parcours = :parcours, note_maths = :note_maths, note_informatique = :note_informatique, note_anglais = :note_anglais, moyenne = :moyenne WHERE nom = :nom AND prenom = :prenom;');
$req->execute(array(
    'nom'=> $_SESSION['form']['nom'],
    'prenom'=>$_SESSION['form']['prenom'],
    'adresse'=>$_SESSION['form']['adresse'],
    'date_de_naissance'=>$_SESSION['form']['date_de_naissance'],
    'parcours'=>$_SESSION['form']['parcours'],
    'note_maths'=>$_SESSION['form']['note_maths'],
    'note_informatique'=>$_SESSION['form']['note_informatique'],
    'note_anglais'=>$_SESSION['form']['note_anglais'],
    'moyenne'=>$_SESSION['form']['moyenne']
));
//include('../templates/unset_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master MIAGE - Candidature mise à jour</title>
</head>

<body>
<script>alert('Candidature mise à jour');
window.location.href = '.';
</script>
</body>
</html>
