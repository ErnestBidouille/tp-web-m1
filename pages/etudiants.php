<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../templates/head.php') ?>
    <title>Master MIAGE - Etudiants</title>
</head>

<body class="px-1">
    <?php
      include('../templates/bdd.php');
      include('../templates/body.php');
    ?>
    <div class="mb-3">
        <h3>Nos étudiants inscrits</h3>
        <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
        </div>
    </div>
    <?php
      $results = $bdd->query('SELECT * FROM `etudiant` JOIN stage ON id_stage WHERE inscrit=1 AND stage=id_stage');
      $n = $results->rowCount();

      echo <<< html
      <div class="alert alert-info"><strong>Info</strong>: $n étudiants inscrit(s).</div>
html;
    ?>

    <div class="card-columns">
      <?php
        while ($etudiant = $results->fetch()) {
          $id = $etudiant['id_etudiant'];
          $nom = $etudiant['nom'];
          $prenom = $etudiant['prenom'];
          $photo = $etudiant['photo'] ? $etudiant['photo'] : 'https://shorturl.at/mLQW8';
          $domaine = $etudiant['domaine'];
          echo <<< html
          <div class="card">
            <img class="card-img-top" src="$photo" alt="Photo de $prenom $nom">
            <div class="card-body">
              <a class="card-title text-dark" href="./etudiant?id=$id"><h5># $prenom $nom</h5></a>
              <p class="card-text">
                <span class="badge badge-warning">$domaine</span>
              </p>
            </div> 
          </div>
html;
        }
      ?>
    </div>

    <script>
      PageEtudiants();
    </script>
</body>

</html>