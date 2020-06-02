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
            $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, adresse, date_de_naissance, parcours, note_maths, note_informatique, note_anglais, moyenne) VALUES(:nom, :prenom, :adresse, :date_de_naissance, :parcours, :note_maths, :note_informatique, :note_anglais, :moyenne)');
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
            echo <<<html
            <p>Candidature en cours de validation</p>
            <a href='./' class="btn-primary">Retour</a>
html;
        }else{
            $row = $result->fetch();
            if($row['inscrit'] == 1){
                echo <<<html
                Erreur ! Cet étudiant est déjà inscrit
                <a href='./' class="btn-primary">Retour</a>
html;
            }else{
                echo '<table><tr><th></th><th>Anciennes valeurs</th><th>Nouvelles valeurs</th></tr>';
                foreach($_SESSION['form'] as $key=>$value){
                    echo '<tr><td>'.$key.'</td><td>'.$row[$key].'</td><td>'.$value.'</td></tr>';
                }
                echo '</table>';
                ?>
                <a href="." class="btn-primary">Annuler les changements</a>
                <a href="--------" class="btn-primary">Confirmer les changements</a>
                <a href="./delete.php" class="btn-danger">Supprimer la candidature</a>
                <?php
            }
        }
            