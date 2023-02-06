<?php
    require_once 'config.php';

    class emprunter{
        private $codeEtud;
        private $codeLivre;
        private $date;

        public function __construct($codeEtud,$codeLivre,$date){
            $this->codeEtud = $codeEtud;
            $this->codeLivre = $codeLivre;
            $this->date = $date;
        }

        public function addEmprunter(){
            //$req=$GLOBALS['db']->prepare("INSERT INTO emprunter (CodeEtudiant, CodeLivre) VALUES (:codeetud, :codelivre)");
            $req=$GLOBALS['db']->prepare("INSERT INTO emprunter(CodeEtudiant, CodeLivre, DataEmprunt) SELECT CodeEtudiant, CodeLivre, CURDATE() FROM etudiant,  livre WHERE etudiant.CodeEtudiant=:codeetud and livre.codeLivre=:codelivre;");
            $req->bindValue(':codeetud', $this->codeEtud);
            $req->bindValue(':codelivre', $this->codeLivre);
            $res = $req->execute();
            
            return $res;
        }

        public function selectEmprunter(){
            $req=$GLOBALS['db']->prepare("SELECT * FROM emprunter");
            $res = $req->execute();
            $res = $req->fetchAll();
            if(!(empty($res))){
                return $res;
            }
        }


        public function check_code_Empru(){
            $req=$GLOBALS['db']->prepare("SELECT * FROM emprunter WHERE CodeEtudiant=:codeetud");
            $req->bindValue(':codeetud', $this->codeEtud);
            $res = $req->execute();
            $res = $req->fetch();
            return $res;
        }

        public function selectEmprunte(){
            $req=$GLOBALS['db']->prepare("SELECT Nom, Prenom, Titre, Auteur, DataEmprunt
                                          FROM etudiant, livre, emprunter
                                          WHERE etudiant.CodeEtudiant = emprunter.CodeEtudiant AND livre.CodeLivre = emprunter.CodeLivre");
            $res = $req->execute();
            $res = $req->fetchAll();
            return $res;
        }

    }

    
