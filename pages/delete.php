<?php
include('../templates/bdd.php');
$req = $bdd->prepare('DELETE from etudiant where nom = :nom and prenom = :prenom');
$req->execute(array(
	'nom' => $_SESSION['form']['nom'],
	'prenom' => $_SESSION['form']['prenom']
    ));
include('../templates/unset_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master MIAGE - Candidature supprimée</title>
</head>
<body>
<script>alert('Candidature supprimée');
window.location.href = '.';
</script>
</body>
</html>
