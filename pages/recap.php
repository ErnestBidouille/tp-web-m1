<?php
    include('../templates/bdd.php');
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST)){
        var_dump($_POST);
        var_dump($_FILES);
        foreach($_POST as $key=>$value){
            if(empty(trim($value))){
                if($key != 'lmt' && !isset($_FILES['lm'])){
                    $errors[$key]= 'Le champs ne peut être vide.';
                }
            }
        }
        $dob = strtotime(str_replace("/", "-", $_POST["date_de_naissance"]));
        $tdate = time();
        $age = date('Y', $tdate) - date('Y', $dob);
        if($age < 20 || $age > 35 || !$dob){
            $errors['date_de_naissance'] = 'Vous devez avoir entre 20 et 35 ans.';
        }
        $prenom = trim($_POST['prenom']);
        if(strlen($prenom) < 3 || strlen($prenom) > 20 || !ctype_alpha($prenom)){
            $errors['prenom'] = 'Le prénom ne doit être composé que de lettres et d\'une longueur 3 à 20 caractères.';
        }
        $nom = trim($_POST['nom']);
        if(strlen($nom) < 3 || strlen($nom) > 20 || !ctype_alpha($nom)){
            $errors['nom'] = 'Le nom ne doit être composé que de lettres et d\'une longueur 3 à 20 caractères.';
        }
        $maths = trim($_POST['maths']);
        if($maths < 10 || $maths > 20){
            $errors['maths'] = 'Une note supérieure ou égale à 10 et inférieure ou égale à 20 est requise en mathématiques.';
        }

        $note_informatique = trim($_POST['note_informatique']);
        if($note_informatique < 15 || $maths > 20){
            $errors['note_informatique'] = 'Une note supérieure ou égale à 15 et inférieure ou égale à 20 est requise en info.';
        }

        $english = trim($_POST['english']);
        if($english < 12 || $maths > 20){
            $errors['english'] = 'Une note supérieure ou égale à 12 et inférieure ou égale à 20 est requise en anglais.';
        }

        $average = trim($_POST['average']);
        if($average < 14 || $maths > 20){
            $errors['average'] = 'Une note supérieure ou égale à 14 et inférieure ou égale à 20 est requise en moyenne générale.';
        }
        
        if(empty($_POST['lmt']) && $_FILES['lm']['size'] == 0){
            $errors['lm'] = 'Veuillez fournir une lettre de motivation';
        }

        $_SESSION['form'] = $_POST;
        $_SESSION['file'] = $_FILES['lm'];
        if(isset($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: ./candidater.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../templates/head.php') ?>
    <title>Master MIAGE - Confirmation inscription</title>
</head>

<body>
    <?php include('../templates/body.php') ?>
    <h1>Confirmation des informations saisies</h1>
    <form enctype="multipart/form-data" action="./save.php" method="post">
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['form']['prenom']?>" disabled>
        
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['form']['nom']?>" disabled>
        
        <label for="adresse">Adresse : </label>
        <input type="text" name="adresse" id="adresse" value="<?php echo $_SESSION['form']['adresse']?>" disabled>
        
        <label for="date_de_naissance">Date de naissance : </label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php echo $_SESSION['form']['date_de_naissance']?>" disabled>
        
        <p>Parcours : 
            <?php echo $_SESSION['form']['parcours']?>
        </p>
        
        <label for="maths">Note en mathématiques : </label>
        <input type="number" name="maths" id="maths" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['maths']?>" disabled>
        
        <label for="note_informatique">Note en info : </label>
        <input type="number" name="note_informatique" id="note_informatique" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['note_informatique']?>" disabled>
        
        <label for="english">Note en anglais : </label>
        <input type="number" name="english" id="english" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['english']?>" disabled>
        
        <label for="average">Moyenne générale : </label>
        <input type="number" name="average" id="average" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['average']?>" disabled>
        
        <div>Lettre de motivation :</div>
        <?php echo empty($_SESSION['form']['lmt'])? $_FILES['lm']['name'] : $_SESSION['form']['lmt']?>
        <p>Ces informations sont-elles correctes ?</p>
        <a href="./candidater.php" class="btn btn-primary">Retour</a>
        <input type="submit" value="Sauvegarde">
    </form>
</body>
</html>
