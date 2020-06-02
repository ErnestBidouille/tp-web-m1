<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('../templates/head.php') ?>
    <title>Candidater - Master MIAGE</title>
</head>
<body>
    <?php
        include('../templates/bdd.php');
        include('../templates/body.php');
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
                echo <<<html
                Erreur ! Cet étudiant est déjà inscrit
                <a href='./' class="btn-primary">Retour</a>
html;
            }else{
                unset($_SESSION['form']['MAX_FILE_SIZE']);
                unset($_SESSION['form']['choicelm']);
                unset($_SESSION['form']['lmt']);
                echo '<table><tr><th></th><th>Anciennes valeurs</th><th>Nouvelles valeurs</th></tr>';
                foreach($_SESSION['form'] as $key=>$value){
                    if($key=='lm'){
                        continue;
                    }
                    echo '<tr><td>'.$key.'</td><td>'.$row[$key].'</td><td>'.$value.'</td></tr>';
                }
                echo '<tr><td>Lettre de motivation</td><td><a href="./file?id='.$row['lettre_motivation'].'" target="_blank">Télécharger</a></td><td><a href="./file?id='.$_SESSION['form']['lm'].'" target="_blank">Télécharger</a></td></tr>';
                
                echo '</table>';
                ?>
                <a href="./cancel" class="btn btn-light">Annuler</a>
                <a href="./delete" class="btn btn-danger">Supprimer la candidature</a>
                <a href="./update" class="btn btn-primary">Confirmer</a>
                <?php
            }
        }
            