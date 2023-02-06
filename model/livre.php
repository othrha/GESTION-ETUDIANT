<?php
require_once "config.php";
class livre{
    private  $code;
    private  $titre;
    private  $auteur;
    private  $date;

    public function __construct($code,$titre,$auteur,$date) {
        $this->code = $code;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->date = $date;
    }

    function get_code() {
        return $this->code;
    }
    function get_titre() {
        return $this->titre;
    }
    function get_auteur() {
        return $this->auteur;
    }
    function get_date() {
        return $this->date;
    }

    public function addLivre(){
        
        $req=$GLOBALS['db']->prepare("INSERT INTO livre (CodeLivre, Titre, Auteur, DateEdition) VALUES (:code, :titre, :auteur, :date)");
        $req->bindValue(':code', $this->code );
        $req->bindValue(':titre', $this->titre );
        $req->bindValue(':auteur', $this->auteur);
        $req->bindValue(':date', $this->date);
        $res = $req->execute();
        return $res;
    }
    //--------------------------virefier code -------------------------------------------------------
    public function check_code_Livre(){
        $req=$GLOBALS['db']->prepare("SELECT * FROM livre WHERE CodeLivre=:code");
        $req->bindValue(':code', $this->code);
        $res = $req->execute();
        $res = $req->fetch();
        return $res;
    }
//---------------------------------------
    public function selectLivre(){
        $req=$GLOBALS['db']->prepare("SELECT * FROM livre");
        $res = $req->execute();
        $res = $req->fetchAll();
        
        return $res;
    
    }

    //----------suppression Etudiant--------
    public function suppressionLivre(){
        $req=$GLOBALS['db']->prepare("DELETE FROM livre WHERE CodeLivre=:code");
        $req->bindValue(':code', $this->code);
        $res = $req->execute();
        return $res;
    }
    //------------- Autocomplete Ajax-------------

    public function autocomplete_ajax($auto_val){
        $req = $GLOBALS['db']->prepare("SELECT * FROM livre WHERE CodeLivre LIKE '$auto_val%' OR Titre LIKE '$auto_val%' OR Auteur LIKE '$auto_val%' OR DateEdition LIKE '$auto_val%'");
        $req->execute();
        $res_tab = $req->fetchAll();
        return $res_tab;
}

    //-------------modification Livre----------

    public function modifierLivre($codeM){
        $req = $GLOBALS['db']->prepare("UPDATE livre SET CodeLivre=:code, Titre=:titre, Auteur=:auteur, DateEdition=:date WHERE CodeLivre=:codeM");
        $req->bindValue(':codeM', $codeM);
        $req->bindValue(':code', $this->code );
        $req->bindValue(':titre', $this->titre );
        $req->bindValue(':auteur', $this->auteur);
        $req->bindValue(':date', $this->date);
        $res = $req->execute();
        return $res;
    }

    //---------recherche Livre------------------------

    public function rechercheLivre($valRecherche){
        if($valRecherche==$this->code){
            $req=$GLOBALS['db']->prepare("SELECT * FROM livre WHERE CodeLivre=:valeur");
        }elseif($valRecherche==$this->titre){
            $req=$GLOBALS['db']->prepare("SELECT * FROM livre WHERE Titre=:valeur");
        }elseif($valRecherche==$this->auteur){
            $req=$GLOBALS['db']->prepare("SELECT * FROM livre WHERE Auteur=:valeur");
        }elseif($valRecherche==$this->date){
            $req=$GLOBALS['db']->prepare("SELECT * FROM livre WHERE DateEdition=:valeur");
        }
        
        $req->bindValue(':valeur', $valRecherche);
        $res = $req->execute();
        $res = $req->fetch();
        return $res;
    }
    
}











