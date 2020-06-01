<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('../templates/head.php') ?>
    <title>Candidater - Master MIAGE</title>
</head>
<body>
    <?php
        include('../templates/body.php');
        session_start();
    ?>

    <div class="container">
        <form enctype="multipart/form-data" action="./recap" method="post">
            <div class="my-1 d-flex flex-column">
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" value="<?php echo isset($_SESSION['form']['prenom'])?$_SESSION['form']['prenom']:''?>">
                <?php echo isset($_SESSION['errors']['prenom'])?'<div class="error">'.$_SESSION['errors']['prenom'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" value="<?php echo isset($_SESSION['form']['nom'])?$_SESSION['form']['nom']:''?>">
            <?php echo isset($_SESSION['errors']['nom'])?'<div class="error">'.$_SESSION['errors']['nom'].'</div>':''?>
            
            <div class="my-1 d-flex flex-column">
                <label for="adresse">Adresse : </label>
                <input type="text" name="adresse" id="adresse" value="<?php echo isset($_SESSION['form']['adresse'])?$_SESSION['form']['adresse']:''?>">
                <?php echo isset($_SESSION['errors']['adresse'])?'<div class="error">'.$_SESSION['errors']['adresse'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <label for="date_de_naissance">Date de naissance : </label>
                <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php echo isset($_SESSION['form']['date_de_naissance'])?$_SESSION['form']['date_de_naissance']:''?>">
                <?php echo isset($_SESSION['errors']['date_de_naissance'])?'<div class="error">'.$_SESSION['errors']['date_de_naissance'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <label for="parcours">Parcours : </label>
                <select name="parcours" id="parcours">
                    <option value="L3-Maths">Licence 3 - Mathématiques</option>
                    <option value="L3-note_informatique">Licence 3 - info</option>
                    <option value="INGE">Ecole d'ingénieurs</option>
                    <option value="M1-Maths">Master 1 - Mathématiques</option>
                    <option value="M1-note_informatique">Master 1 - info</option>
                </select>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <label for="maths">Note en mathématiques : </label>
                <input type="number" name="maths" id="maths" min="0" max="20" step="0.01" value="<?php echo isset($_SESSION['form']['maths'])?$_SESSION['form']['maths']:''?>">
                <?php echo isset($_SESSION['errors']['maths'])?'<div class="error">'.$_SESSION['errors']['maths'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <label for="note_informatique">Note en info : </label>
                <input type="number" name="note_informatique" id="note_informatique" min="0" max="20" step="0.01" value="<?php echo isset($_SESSION['form']['note_informatique'])?$_SESSION['form']['note_informatique']:''?>">
                <?php echo isset($_SESSION['errors']['note_informatique'])?'<div class="error">'.$_SESSION['errors']['note_informatique'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <label for="english">Note en anglais : </label>
                <input type="number" name="english" id="english" min="0" max="20" step="0.01" value="<?php echo isset($_SESSION['form']['english'])?$_SESSION['form']['english']:''?>">
                <?php echo isset($_SESSION['errors']['english'])?'<div class="error">'.$_SESSION['errors']['english'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <label for="average">Moyenne générale : </label>
                <input type="number" name="average" id="average" min="0" max="20" step="0.01" value="<?php echo isset($_SESSION['form']['average'])?$_SESSION['form']['average']:''?>">
                <?php echo isset($_SESSION['errors']['average'])?'<div class="error">'.$_SESSION['errors']['average'].'</div>':''?>
            </div>
            
            <div class="my-1 d-flex flex-column">
                <div>Lettre de motivation :</div>
                <div>Envoyer un fichier
                    <label class="switch">
                        <input type="checkbox" name="choicelm" id="choicelm" onChange="ChangeLetterFormat()" <?php echo isset($_SESSION['form']['choicelm'])?'checked':''?>>
                        <span class="slider round"></span>
                    </label>
                    Ecrire en ligne
                </div>
                
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input type="file" name="lm" id="lm">
                
                <textarea id="lmt" name="lmt"
                rows="5" cols="33" style="display:none;"><?php echo isset($_SESSION['form']['lmt'])?$_SESSION['form']['lmt']:''?></textarea>
                <?php echo isset($_SESSION['errors']['lm'])?'<div class="error">'.$_SESSION['errors']['lm'].'</div>':''?>
                <input class="btn btn-primary" type="submit" value="Candidater">
            </div>
        </form>
    </div>
    <style>
        form{
            display:flex;
            flex-direction: column;
        }
         /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        /* background-color: #2196F3; */
        }

        input:focus + .slider {
        /* box-shadow: 0 0 1px #2196F3; */
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        } 
    </style>
    <?php
        unset($_SESSION['errors']);
        unset($_SESSION['form']);

    ?>
    <script>
      PageCandidater();
      ChangeLetterFormat();
    </script>

</body>
</html>
