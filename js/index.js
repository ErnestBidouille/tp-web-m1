function PageAccueil() {
    $('#nav-accueil').addClass('active');
}

function PageMatieres() {
    $('#nav-matieres').addClass('active');
}

function PageEtudiants() {
    $('#nav-etudiants').addClass('active');
}

function PageCandidater() {
    $('#nav-candidater').addClass('active');
}

const b64toBlob = (base64, type = 'application/octet-stream') =>
    fetch(`data:${type};base64,${base64}`).then(res => res.blob());

function ChangeLetterFormat() {
    if ($('#choicelm').prop('checked')) {
        $('#lmt').show();
        $('#lm').hide();
        $('#lm').val('');
    } else {
        $('#lmt').hide();
        $('#lmt').val('');
        $('#lm').show();
    }
}