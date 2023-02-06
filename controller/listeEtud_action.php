<?php
// afficher liste des etudiants

include '../model/etudiant.php';
    $select = new etudiant("","","","","");
    $liste=$select->selectEtudiant();
    if(!empty($liste)){  
        foreach ($liste as $key => $value) {
            echo '<tr>';
            echo "<td>$value[0]</td>";
            echo "<td>$value[1]</td>";
            echo "<td>$value[2]</td>";
            echo "<td>$value[3]</td>";
            echo "<td>$value[4]</td>";
            echo '</tr>';
        }
    }
