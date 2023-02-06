<?php
require_once "config.php";
class etudiant{
    private  $code;
    private  $nom;
    private  $prenom;
    private  $classe;
    private  $adresse;

    public function __construct($code,$nom,$prenom,$classe,$adresse) {
        $this->code = $code;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->classe = $classe;
        $this->adresse = $adresse;
    }

    function get_code() {
        return $this->code;
    }
    function get_nom() {
        return $this->nom;
    }
    function get_prenom() {
        return $this->prenom;
    }
    function get_classe() {
        return $this->classe;
    }
    function get_adresse() {
        return $this->adresse;
    }

    public function addEtudiant(){
        
        $req=$GLOBALS['db']->prepare("INSERT INTO etudiant (CodeEtudiant, Nom, Prenom, Classe, Adresse) VALUES (:code, :nom, :prenom, :classe, :adresse)");
        $req->bindValue(':code', $this->code );
        $req->bindValue(':nom', $this->nom );
        $req->bindValue(':prenom', $this->prenom);
        $req->bindValue(':classe', $this->classe);
        $req->bindValue(':adresse', $this->adresse);
        $res = $req->execute();
        return $res;
    }
    //--------------------------virefier code -------------------------------------------------------
    public function check_code_Etud(){
        $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE CodeEtudiant=:code");
        $req->bindValue(':code', $this->code);
        $res = $req->execute();
        $res = $req->fetch();
        return $res;
    }
//---------------------------------------
    public function selectEtudiant(){
        $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant");
        $res = $req->execute();
        $res = $req->fetchAll();
        return $res;
        
    }

    //----------suppression Etudiant--------
    public function suppressionEtud(){
        $req=$GLOBALS['db']->prepare("DELETE FROM etudiant WHERE CodeEtudiant=:code");
        $req->bindValue(':code', $this->code);
        $res = $req->execute();
        return $res;
    }
    //------------- Autocomplete Ajax-------------

    public function autocomplete_ajax($auto_val){
        $req = $GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE CodeEtudiant LIKE '$auto_val%' OR Nom LIKE '$auto_val%' OR Prenom LIKE '$auto_val%' OR Classe LIKE '$auto_val%' OR Adresse LIKE '$auto_val%'");
        $req->execute();
        $res_tab = $req->fetchAll();
        return $res_tab;
}

    //-------------modification Etudiant----------

    public function modifierEtud($codeM){
        $req = $GLOBALS['db']->prepare("UPDATE etudiant SET CodeEtudiant=:code, Nom=:nom, Prenom=:prenom, Adresse=:adresse, Classe=:classe WHERE CodeEtudiant=:codeM");
        $req->bindValue(':codeM', $codeM);
        $req->bindValue(':code', $this->code );
        $req->bindValue(':nom', $this->nom );
        $req->bindValue(':prenom', $this->prenom);
        $req->bindValue(':classe', $this->classe);
        $req->bindValue(':adresse', $this->adresse);
        $res = $req->execute();
        return $res;
    }

    //---------recherche etudiant------------------------

    public function rechercheEtudiant($valRecherche){
        if($valRecherche==$this->code){
            $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE CodeEtudiant=:valeur");
        }elseif($valRecherche==$this->nom){
            $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE Nom=:valeur");
        }elseif($valRecherche==$this->prenom){
            $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE Prenom=:valeur");
        }elseif($valRecherche==$this->classe){
            $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE Classe=:valeur");
        }elseif($valRecherche==$this->adresse){
            $req=$GLOBALS['db']->prepare("SELECT * FROM etudiant WHERE Adresse=:valeur");
        }
        
        $req->bindValue(':valeur', $valRecherche);
        $res = $req->execute();
        $res = $req->fetch();
        return $res;
    }
    

    
}


/*$test = new etudiant(1,"","","","");
$tabl = $test->autocomplete_ajax("test");
var_dump($tabl);*/








