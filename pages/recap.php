<?php
    include('../templates/bdd.php');
    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST)){
        foreach($_POST as $key=>$value){
            if(empty(trim($value))){
                if($key == 'lmt' && isset($_FILES['lm'])){
                    continue;
                }else{
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
        $note_maths = trim($_POST['note_maths']);
        if($note_maths < 10 || $note_maths > 20){
            $errors['note_maths'] = 'Une note supérieure ou égale à 10 et inférieure ou égale à 20 est requise en mathématiques.';
        }

        $note_informatique = trim($_POST['note_informatique']);
        if($note_informatique < 15 || $note_maths > 20){
            $errors['note_informatique'] = 'Une note supérieure ou égale à 15 et inférieure ou égale à 20 est requise en info.';
        }

        $note_anglais = trim($_POST['note_anglais']);
        if($note_anglais < 12 || $note_maths > 20){
            $errors['note_anglais'] = 'Une note supérieure ou égale à 12 et inférieure ou égale à 20 est requise en anglais.';
        }

        $moyenne = trim($_POST['moyenne']);
        if($moyenne < 14 || $note_maths > 20){
            $errors['moyenne'] = 'Une note supérieure ou égale à 14 et inférieure ou égale à 20 est requise en moyenne générale.';
        }
        
        if(empty($_POST['lmt']) && $_FILES['lm']['size'] == 0){
            $errors['lm'] = 'Veuillez fournir une lettre de motivation';
        }

        $_SESSION['form'] = $_POST;
        $_SESSION['file'] = $_FILES['lm'];
        if(isset($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: ./candidater');
            exit();
        }
        if($_FILES['lm']['size'] != 0){
            $blob = file_get_contents($_FILES['lm']['tmp_name'], 'rb');
        }
        else{
            $tmpfname = tempnam("../tmp", "tmp");
            $handle = fopen($tmpfname, "w");
            fwrite($handle, $_POST['lmt']);
            fclose($handle);
            $blob = file_get_contents($tmpfname, 'rb').
            unlink($tmpfname);
        }
        $req = $bdd->prepare('INSERT INTO files(mime, data) VALUES (:mime, :data);');
        $req->execute(array(
            'mime'=> $_FILES['lm']['type'],
            'data'=>$blob
        ));  
        $_SESSION['form']['lm'] = $bdd->lastInsertId();
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../templates/head.php') ?>
    <title>Master MIAGE - Confirmation inscription</title>
</head>

<body class="px-1">
    <?php include('../templates/body.php') ?>

    <div class="mb-3">
      <h3>Confirmation des informations saisies</h3>
      <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
      </div>
    </div>

    <form enctype="multipart/form-data" action="./save" method="post">
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['form']['prenom']?>" disabled>
        
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['form']['nom']?>" disabled>
        
        <label for="adresse">Adresse : </label>
        <input type="text" name="adresse" id="adresse" value="<?php echo $_SESSION['form']['adresse']?>" disabled>
        
        <label for="date_de_naissance">Date de naissance : </label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php echo $_SESSION['form']['date_de_naissance']?>" disabled>
        
        <label>Parcours :</label>
        <select name="parcours" id="parcours" disabled>
            <option value="parcours">
                <?php echo $_SESSION['form']['parcours']?>
            </option> 
        </select>
        
        <label for="note_maths">Note en mathématiques : </label>
        <input type="number" name="note_maths" id="note_maths" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['note_maths']?>" disabled>
        
        <label for="note_informatique">Note en info : </label>
        <input type="number" name="note_informatique" id="note_informatique" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['note_informatique']?>" disabled>
        
        <label for="note_anglais">Note en anglais : </label>
        <input type="number" name="note_anglais" id="note_anglais" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['note_anglais']?>" disabled>
        
        <label for="moyenne">Moyenne générale : </label>
        <input type="number" name="moyenne" id="moyenne" min="0" max="20" step="0.01" value="<?php echo $_SESSION['form']['moyenne']?>" disabled>
        
        <label>Lettre de motivation :</label>
        <a href="./file?id=<?php echo $_SESSION['form']['lm']?>" target="_blank" class="btn btn-info w-20 align-self-start">Visualiser la lettre de motivation</a>
        <p>Ces informations sont-elles correctes ?</p>
        <div class="d-flex flex-row">
            <a href="./candidater" class="btn btn-light w-25 align-self-end ml-2">Retour</a>
            <input class="btn btn-primary w-25 align-self-end ml-2" type="submit" value="Sauvegarder">
        </div>
    </form>
</body>
</html>
