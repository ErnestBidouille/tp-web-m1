<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../templates/head.php') ?>
    <title>Master MIAGE - Matieres</title>
</head>

<body class="px-1">
    <?php include('../templates/bdd.php'); include('../templates/body.php'); include('../templates/matiere.php'); ?>

    
    <div class="mb-3">
      <h3>PROGRAMME DE LA FORMATION</h3>
      <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
      </div>
    </div>

    <div class="d-flex flex-row my-4">
      <div class="list-group w-50 mr-2">
        <div class="list-group-item bg-light">
          Semestre 1
        </div>
        <?php
          $result = $bdd->query('SELECT * FROM matiere WHERE semestre="S1";');
          TableauMatiere($result);
        ?>
      </div>
      <div class="list-group w-50">
        <div class="list-group-item bg-light">
          Semestre 2
        </div>
        <?php
          $result = $bdd->query('SELECT * FROM matiere WHERE semestre="S2";');
          TableauMatiere($result);
        ?>
      </div>
    </div>

    <?php include('../templates/endbody.php') ?>
    <script>
      PageMatieres();
    </script>
</body>

</html>