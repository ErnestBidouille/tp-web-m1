<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../templates/head.php') ?>
    <title>Master MIAGE - Accueil</title>
</head>

<body class="px-1">
    <?php 
      include('../templates/bdd.php');
      include('../templates/body.php');
    ?>

    <h2>
      <span class="badge badge-primary">M1</span> Méthodes informatiques Appliquées pour la Gestion des Entreprises
    </h2>
    <i class="text-dark">Lien vers <a href="https://dauphine.fr" target="_blank">dauphine.fr</a></i>

    <div class="my-4 container d-flex align-items-center flex-row bg-light rounded p-4">
      <div>
        <img src="https://dauphine.psl.eu/fileadmin/images/logos/pictos-formations/master-diplome-national.svg" alt="diplome" width="104px">
      </div>
      <div class="mx-3 ml-5">
        <div class="mb-1">
          <strong>Régime d'étude</strong>&nbsp;&nbsp;<span class="badge badge-warning">Apprentissage</span>
        </div>
        <div class="mb-1">
          <strong>Langue(s)</strong>&nbsp;&nbsp;<span class="badge badge-primary">Français</span>
        </div>
        <div class="mb-1">
          <strong>Crédits ECTS</strong>&nbsp;&nbsp;<span class="badge">60 crédits</span>
        </div>
      </div>
      <div class="mx-3">
        <div class="mb-1">
          <strong>Capacité d'accueil</strong>&nbsp;&nbsp;<span class="badge">30 étudiants</span>
        </div>
        <div class="mb-1">
          <strong>Année universitaire</strong>&nbsp;&nbsp;<span class="badge badge-danger">2020/2021</span>
        </div>
        <div class="mb-1">
          <strong>Type de diplôme</strong>&nbsp;&nbsp;<span class="badge">Diplôme national de Master</span>
        </div>
      </div>
    </div>

    <div class="mb-3">
      <h3>LES OBJECTIFS DE LA FORMATION</h3>
      <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
      </div>
    </div>

    <p class="text-justify">
      La 1ère année de Master - <i>Méthodes informatiques Appliquées pour la Gestion des Entreprises</i> (<b>MIAGE</b>) a pour vocation de former des professionnels et des chercheurs maîtrisant parfaitement l'outil informatique et possédants une bonne connaissance de l'organisation et du fonctionnement de l'entreprise. MIAGE garde un ancrage fort dans le réseau national des MIAGE, qui regroupe l'ensemble des formations analogues dans vingt universités française.
    </p>

    <div class="d-flex flex-column">
      <div>
        <i data-feather="chevron-right"></i> Utiliser, maîtriser et intégrer les technologies informatiques
      </div>
      <div>
        <i data-feather="chevron-right"></i> D'aborder la modélisation de systèmes d'information et les méthodes de conduites de projet
      </div>
      <div>
        <i data-feather="chevron-right"></i> Comprendre le fonctionnement des organisations, leurs structures, notamment dans la dimension opérationnelle et humaine
      </div>
      <div>
        <i data-feather="chevron-right"></i> Apprendre et maîtriser l'anglais et une LV2 obligatoire, avec une certification en anglais par le TOEIC
      </div>
    </div>

    <div class="d-flex justify-content-center flex-row my-5">
      <div class="mr-2">
        <a href="./matieres" style="background: rgb(238, 60, 55);" class="d-block text-white p-3 rounded">
          Consulter le programme <i data-feather="chevron-right"></i>
        </a>
      </div>
      <div class="mr-2">
        <a href="./candidater" style="background: rgb(238, 60, 55);" class="d-block text-white p-3 rounded">
          Candidater <i data-feather="chevron-right"></i>
        </a>
      </div>
      <div class="mr-2">
        <a href="./etudiants" style="background: rgb(238, 60, 55);" class="d-block text-white p-3 rounded">
          Parcourir le trombinoscope <i data-feather="chevron-right"></i>
        </a>
      </div>
    </div>

    <div class="mb-3">
      <h3>TEMOIGNAGES D'ANCIENS</h3>
      <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
      </div>
    </div>

    <blockquote class="blockquote">
      <p class="mb-0">Ce master m'a pris à la gorge de par sa complexité et son approche innovante. De loin ma meilleure année d'étude.</p>
      <footer class="blockquote-footer">George Floyd <cite title="Source Title">ancien étudiant du master</cite></footer>
    </blockquote>

    <?php include('../templates/endbody.php'); include('../templates/unset_session.php'); ?>
    <script>
      PageAccueil();
    </script>
</body>

</html>