<?php
// afficher liste des livres

include '../model/livre.php';
    $select = new livre("","","","");
    $liste=$select->selectLivre();
    if(!empty($liste)){
        foreach ($liste as $key => $value) {
            echo '<tr>';
            echo "<td>$value[0]</td>";
            echo "<td>$value[1]</td>";
            echo "<td>$value[2]</td>";
            echo "<td>$value[3]</td>";
            echo '</tr>';
        };
    }