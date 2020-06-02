<?php

function TableauMatiere($result) {
    while ($data = $result->fetch()) {
        $semestre = $data['semestre'];
        $nom = $data['nom'];
        $id = str_replace(' ', '_', $nom);        
        $heures = $data['heures'];
        $description = $data['description'];
        $enseignant = $data['enseignant'];
        $option = $data['is_option'] ? 'Option' : '';
        $semestre_color = $semestre == 'S1' ? 'danger' : 'primary';
        echo <<< html
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" onclick="toggleMatiere('$id')">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><span class="badge badge-$semestre_color">$semestre</span> <span class="badge badge-info">$option</span> $nom</h5>
                <small><strong>$heures h</strong> $enseignant</small>
            </div>
            <p class="mb-1 ellipsis" id="$id">$description</p>
        </a>
html;
      }
}
