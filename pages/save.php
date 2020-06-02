<?php
include('../templates/bdd.php');
$q = 'SELECT * FROM etudiant where nom=\''.$_SESSION['form']['nom'].'\' and prenom=\''.$_SESSION['form']['prenom'].'\';';
$result = $bdd->query($q);
if($result->rowCount() == 0){
    $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, adresse, date_de_naissance, parcours, note_maths, note_informatique, note_anglais, moyenne, lettre_motivation) VALUES(:nom, :prenom, :adresse, :date_de_naissance, :parcours, :note_maths, :note_informatique, :note_anglais, :moyenne, :lettre_motivation)');
    $req->execute(array(
        'nom'=> $_SESSION['form']['nom'],
        'prenom'=>$_SESSION['form']['prenom'],
        'adresse'=>$_SESSION['form']['adresse'],
        'date_de_naissance'=>$_SESSION['form']['date_de_naissance'],
        'parcours'=>$_SESSION['form']['parcours'],
        'note_maths'=>$_SESSION['form']['note_maths'],
        'note_informatique'=>$_SESSION['form']['note_informatique'],
        'note_anglais'=>$_SESSION['form']['note_anglais'],
        'moyenne'=>$_SESSION['form']['moyenne'],
        'lettre_motivation'=>$_SESSION['form']['lm']
    ));
    include('../templates/unset_session.php');
    ?>
    <script>alert('Candidature en cours de validation');window.location.href = '.';</script>
    <?php
}else{
    $row = $result->fetch();
    if($row['inscrit'] == 1){
        echo '<script>alert("Erreur ! Cette personne est inscrite dans ce master");window.location.href = '.';</script>';
    }else{
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <?php include('../templates/head.php') ?>
            <title>Candidater - Master MIAGE</title>
        </head>
        <body class="px-1">
            <?php include('../templates/body.php');?>

            <div class="mb-3">
                <h3>Modification d'un candidat existant</h3>
                <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
                </div>
            </div>

            <?php
            unset($_SESSION['form']['MAX_FILE_SIZE']);
            unset($_SESSION['form']['choicelm']);
            unset($_SESSION['form']['lmt']);
            echo '<table class="table"><tr><th></th><th>Anciennes valeurs</th><th>Nouvelles valeurs</th></tr>';
            $keys = [
                'prenom'=>'Prénom',
                'nom'=>'Nom',
                'adresse'=>'Adresse',
                'date_de_naissance'=>'Date de naissance',
                'parcours'=>'Parcours',
                'note_maths'=>'Note en mathématiques',
                'note_informatique'=>'Note en informatique',
                'note_anglais'=>'Note en anglais',
                'moyenne'=>'Moyenne générale',
                
                
            ];
            foreach($_SESSION['form'] as $key=>$value){
                if($key=='lm'){
                    continue;
                }
                echo '<tr><td>'.$keys[$key].'</td><td>'.$row[$key].'</td><td>'.$value.'</td></tr>';
            }
            echo '<tr><td>Lettre de motivation</td><td><a href="./file?id='.$row['lettre_motivation'].'" target="_blank">Télécharger</a></td><td><a href="./file?id='.$_SESSION['form']['lm'].'" target="_blank">Télécharger</a></td></tr></table>';
            ?>

            <div><p>Faites un choix : </p>
            <a href="./cancel" class="btn btn-light">Annuler les changements</a>
            <a href="./delete" class="btn btn-danger">Supprimer la candidature</a>
            <a href="./update" class="btn btn-primary">Confirmer les changements</a>
            </div>
<?php
    }
}
                