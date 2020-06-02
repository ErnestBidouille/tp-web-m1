<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../templates/head.php') ?>
    <title>Master MIAGE - Etudiant</title>
</head>

<body>
    <?php
        include('../templates/bdd.php'); 
        include('../templates/body.php');
        $id = $_GET['id']; // nice trick damn
        $result = $bdd->query('SELECT * FROM etudiant JOIN stage ON id_stage WHERE inscrit=1 AND stage=id_stage AND id_etudiant=' . $id . ';');
        if ($result->rowCount() != 0) {
            $etudiant = $result->fetch();
            $img = $etudiant['photo'] ? $etudiant['photo'] : 'https://shorturl.at/mLQW8';
            $nom = $etudiant['nom'];
            $prenom = $etudiant['prenom'];
            $candidat = $etudiant['inscrit'] ? '' : 'Candidat';
            $dob = $etudiant['date_de_naissance'];
            $adresse = $etudiant['adresse'];
            $parcours = $etudiant['parcours'];
            $cv = $etudiant['cv'];
            $domaine = $etudiant['domaine'];
            $entreprise = $etudiant['entreprise'];
            $lien_entreprise = $etudiant['lien_entreprise'];
            echo <<< html
            <div class="container d-flex flex-row border-bottom pb-4">
                <div class="d-flex flex-column">
                    <img src="$img" alt="Photo de $nom $prenom" class="rounded" width="156px" />
                    <a class="btn btn-primary mt-3" href="./file?id=$cv" download="cv.pdf">Télécharger le CV</a>
                </div>
                <div class="ml-4 d-flex flex-column">
                    <div>
                        <h3>$prenom $nom <small><span class="badge badge-warning">$candidat</span></small></h3>
                        <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;"></div>
                    </div>
                    <div class="mt-3"> </div>
                    <div class="mt-1">
                        <b>Date de naissance</b> : $dob
                    </div>
                    <div class="mt-1">
                        <b>Adresse</b> : $adresse
                    </div>
                    <div class="mt-1">
                        <b>Parcours initial</b> : <span class="badge badge-danger">$parcours</span>
                    </div>
                    <div class="mt-1">
                        <b>Domaine</b> : <span class="badge badge-warning">$domaine</span>
                    </div>
                    <div class="mt-1">
                        <b>Nom de l'entreprise</b> : $entreprise (<a href="$lien_entreprise" target="_blank">site</a>)
                    </div>
                </div>
            </div>
            html;
        } else {
            echo <<< html
            <div>
                <div class="container">
                    <div class="alert alert-danger">Aucun étudiant trouvé dans la base.</div>
                </div>
                <div class="container d-flex flex-row border-bottom pb-4">
                    <div class="d-flex flex-column">
                        <img src="https://shorturl.at/mLQW8" alt="Photo de Inconnu" class="rounded" width="156px" />
                    </div>
                    <div class="ml-4 d-flex flex-column">
                        <div>
                            <h3>Inconnu</h3>
                            <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;"></div>
                        </div>
                        <div class="mt-3"> </div>
                        <div class="mt-1">
                            <b>Date de naissance</b> :
                        </div>
                        <div class="mt-1">
                            <b>Adresse</b> :
                        </div>
                        <div class="mt-1">
                            <b>Parcours initial</b> :
                        </div>
                    </div>
                </div>
            </div>
            html;
        }
    ?>

    <?php include('../templates/endbody.php') ?>
    <script>
      PageEtudiants();
    </script>
</body>

</html>