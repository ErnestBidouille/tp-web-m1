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

function toggleMatiere(id) {
    if ($(`#${id}`).hasClass('ellipsis')) {
        $(`#${id}`).removeClass('ellipsis');
    } else {
        $(`#${id}`).addClass('ellipsis');
    }
}

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