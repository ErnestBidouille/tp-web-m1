<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('../templates/head.php') ?>
    <title>Candidater - Master MIAGE</title>
</head>
<body>
    <?php
        include('../templates/body.php');
        include('../templates/bdd.php');
        session_start();
        $q = 'SELECT * FROM etudiant where nom=\''.$_SESSION['form']['nom'].'\' and prenom=\''.$_SESSION['form']['prenom'].'\';';
        $result = $bdd->query($q);
        if($result->rowCount() == 0){
            $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, adresse, date_de_naissance, parcours, note_maths, note_info, note_anglais, moyenne) VALUES(:nom, :prenom, :adresse, :date_de_naissance, :parcours, :maths, :note_info, :english, :average)');
            $req->execute(array(
                'nom'=> $_SESSION['form']['nom'],
                'prenom'=>$_SESSION['form']['prenom'],
                'adresse'=>$_SESSION['form']['adresse'],
                'date_de_naissance'=>$_SESSION['form']['date_de_naissance'],
                'parcours'=>$_SESSION['form']['parcours'],
                'maths'=>$_SESSION['form']['maths'],
                'note_info'=>$_SESSION['form']['note_info'],
                'english'=>$_SESSION['form']['english'],
                'average'=>$_SESSION['form']['average']
            ));
            echo <<<html
            <p>Candidature en cours de validation</p>
            <a href='./' class="btn-primary">Retour</a>
html;
        }else{
            $row = $result->fetch();
            var_dump($row);
            if($row['inscrit'] == 1){
                echo <<<html
                Erreur ! Cet étudiant est déjà inscrit
                <a href='./' class="btn-primary">Retour</a>
html;
            }else{
                echo '<table><tr><th></th><th>Anciennes valeurs</th><th>Nouvelles valeurs</th></tr>';
                
                foreach($_SESSION['form'] as $key=>$value){
                    echo '<tr><td>'.$key.'</td><td>'.$row['key'].'</td><td>'.$value.'</td></tr>';
                }
                echo '</table>';
            }
        }
            