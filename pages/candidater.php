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
    ?>
    <div class="container">    
        <div class="mb-3">
            <h3>CANDIDATER AU MASTER</h3>
                <div class="ml-2" style="background: rgb(238, 60, 55);width: 80px;height: 4px;">
            </div>
        </div>

        <form class="d-flex flex-column" enctype="multipart/form-data" action="./recap" method="post">
            <div class="mt-5 d-flex flex-row border-top py-3">
                <h5 class="mr-4 text-muted" style="width: 22%">
                    Informations personnelles
                </h5>
                <div class="d-flex flex-column flex-fill">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-fill flex-column mx-4">
                            <div class="my-1 d-flex flex-column">
                                <label for="prenom">Prénom : </label>
                                <input type="text" name="prenom" id="prenom" placeholder="Ex: Jean-Pierre" value="<?php echo isset($_SESSION['form']['prenom'])?$_SESSION['form']['prenom']:''?>">
                                <?php echo isset($_SESSION['errors']['prenom'])?'<div class="error">'.$_SESSION['errors']['prenom'].'</div>':''?>
                            </div>
                            <div class="my-1 d-flex flex-column">
                                <label for="date_de_naissance">Date de naissance : </label>
                                <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php echo isset($_SESSION['form']['date_de_naissance'])?$_SESSION['form']['date_de_naissance']:''?>">
                                <?php echo isset($_SESSION['errors']['date_de_naissance'])?'<div class="error">'.$_SESSION['errors']['date_de_naissance'].'</div>':''?>
                            </div>
                        </div>
                        <div class="my-1 mx-4 d-flex flex-fill flex-column">
                            <label for="nom">Nom : </label>
                            <input type="text" name="nom" id="nom" placeholder="Ex: Cassagne" value="<?php echo isset($_SESSION['form']['nom'])?$_SESSION['form']['nom']:''?>">
                            <?php echo isset($_SESSION['errors']['nom'])?'<div class="error">'.$_SESSION['errors']['nom'].'</div>':''?>
                        </div>
                    </div>
                    <div class="my-1 mx-4 d-flex flex-column">
                        <label for="adresse">Adresse : </label>
                        <input type="text" name="adresse" id="adresse" placeholder="Ex: 12 rue des Pigeons" value="<?php echo isset($_SESSION['form']['adresse'])?$_SESSION['form']['adresse']:''?>">
                        <?php echo isset($_SESSION['errors']['adresse'])?'<div class="error">'.$_SESSION['errors']['adresse'].'</div>':''?>
                    </div>
                </div>
            </div>

            <div class="mt-5 d-flex flex-row border-top py-3">
                <h5 class="mr-4 text-muted" style="width: 22%">
                    Cursus universitaire
                </h5>
                <div class="d-flex flex-column flex-fill">
                    <div class="my-1 mx-4 d-flex flex-column">
                        <label for="parcours">Parcours : </label>
                        <select name="parcours" id="parcours">
                            <option value="L3-Maths">Licence 3 - Mathématiques</option>
                            <option value="L3-note_informatique">Licence 3 - info</option>
                            <option value="INGE">Ecole d'ingénieurs</option>
                            <option value="M1-Maths">Master 1 - Mathématiques</option>
                            <option value="M1-note_informatique">Master 1 - info</option>
                        </select>
                    </div>
                    <div class="mt-3 d-flex flex-row">
                        <div class="d-flex flex-fill flex-column mx-4">
                            <div class="my-1 d-flex flex-column">
                                <label for="note_maths">Note en mathématiques : </label>
                                <input type="number" name="note_maths" id="note_maths" min="0" max="20" step="0.01" placeholder="10" value="<?php echo isset($_SESSION['form']['note_maths'])?$_SESSION['form']['note_maths']:''?>">
                                <?php echo isset($_SESSION['errors']['note_maths'])?'<div class="error">'.$_SESSION['errors']['note_maths'].'</div>':''?>
                            </div>
                            
                            <div class="my-1 d-flex flex-column">
                                <label for="note_informatique">Note en informatique : </label>
                                <input type="number" name="note_informatique" id="note_informatique" min="0" max="20" step="0.01" placeholder="10" value="<?php echo isset($_SESSION['form']['note_informatique'])?$_SESSION['form']['note_informatique']:''?>">
                                <?php echo isset($_SESSION['errors']['note_informatique'])?'<div class="error">'.$_SESSION['errors']['note_informatique'].'</div>':''?>
                            </div>
                        </div>
                        <div class="d-flex flex-fill flex-column mx-4">
                            <div class="my-1 d-flex flex-column">
                                <label for="note_anglais">Note en anglais : </label>
                                <input type="number" name="note_anglais" id="note_anglais" min="0" max="20" step="0.01" placeholder="10" value="<?php echo isset($_SESSION['form']['note_anglais'])?$_SESSION['form']['note_anglais']:''?>">
                                <?php echo isset($_SESSION['errors']['note_anglais'])?'<div class="error">'.$_SESSION['errors']['note_anglais'].'</div>':''?>
                            </div>
                            
                            <div class="my-1 d-flex flex-column">
                                <label for="moyenne">Moyenne générale : </label>
                                <input type="number" name="moyenne" id="moyenne" min="0" max="20" step="0.01" placeholder="10" value="<?php echo isset($_SESSION['form']['moyenne'])?$_SESSION['form']['moyenne']:''?>">
                                <?php echo isset($_SESSION['errors']['moyenne'])?'<div class="error">'.$_SESSION['errors']['moyenne'].'</div>':''?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 d-flex flex-row border-top py-3">
                <h5 class="mr-4 text-muted" style="width: 22%">
                    Autres documents
                </h5>
                <div class="d-flex flex-column flex-fill">            
                    <div class="my-1 d-flex flex-column mx-4">
                        <div class="label">Lettre de motivation :</div>
                        <div class="d-flex flex-row align-items-baseline my-3">
                            <span>Envoyer un fichier (Taille maximale : 2 Mo)</span>
                            <label class="switch mx-2">
                                <input type="checkbox" name="choicelm" id="choicelm" onChange="ChangeLetterFormat()" <?php echo isset($_SESSION['form']['choicelm'])?'checked':''?>>
                                <span class="slider round"></span>
                            </label>
                            <span>Ecrire en ligne</span>
                        </div>
                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
                        <input type="file" name="lm" id="lm">
                        
                        <textarea id="lmt" name="lmt" rows="5" cols="33" style="display:none;"><?php echo isset($_SESSION['form']['lmt'])?$_SESSION['form']['lmt']:''?></textarea>
                        <?php echo isset($_SESSION['errors']['lm'])?'<div class="error">'.$_SESSION['errors']['lm'].'</div>':''?>
                        <input class="btn btn-primary my-5 w-25 align-self-end" type="submit" value="Candidater">
                    </div>
                </div>
            </div>

        </form>
    </div>
    <?php
        unset($_SESSION['errors']);
        unset($_SESSION['form']);
        unset($_SESSION['file']);
    ?>
    <script>
      PageCandidater();
      ChangeLetterFormat();
    </script>

</body>
</html>
