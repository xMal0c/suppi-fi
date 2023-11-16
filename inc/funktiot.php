<?php
function tarkistaKirjautuminen()
{
    if (isset($_SESSION['kirjautunut']) && $_SESSION['kirjautunut'] === true) {
        return true;
    } else {
        return false;
    }
}

function luoInputKentta($otsikko, $muuttujaNimi, $muuttujaArvo, $virhekentta, $kentanTyyppi = 'text')
{
    $html = "";
    $is_invalid = '';
    $invalid_feedback = '';

    // if (!empty($virhekentta)) {
    //     $is_invalid = 'is-invalid';
    // }

    $html = "<div class='mb-3'>";
    $html .= "<label for='$muuttujaNimi' class='form-label'>$otsikko</label>";
    $html .= "<input name='$muuttujaNimi' value='$muuttujaArvo' type='$kentanTyyppi' class='form-control $is_invalid' required>";
    $html .= "<div class='invalid-feedback'>";
    $html .= "<small>$virhekentta</small>";
    $html .= "</div>";
    $html .= "</div>";

    return $html;
}
