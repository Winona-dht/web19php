<?php
namespace src\Model;

class Categorie{
    private $Id;
    private $Libelle;
    private $Icon;


    /**
     * Cette fonction retourne les X premiers mots de la description
     * @param $limitWord = LA limite en question
     * @return string
     */
    public function getShortDesc($limitWord){
        $arr = explode(' ',trim($this->Description));
        $arrayFirst = array_slice($arr, 0, $limitWord);
        return implode(" ", $arrayFirst);
    }

    public function SqlAddcat(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO categories (Libelle, Icon) VALUES(:Libelle, :Icon)");

            $requete->execute([
                "Libelle" => $this->getLibelle(),
                "Icon" => $this->getIcon(),

            ]);
            return $bdd->lastInsertId();
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function SqlUpdatecat(\PDO $bdd){
        try {
            $requete = $bdd->prepare("UPDATE categories set Libelle= :Libelle, Icon = :Icon, WHERE Id = :Id");

            $requete->execute([
                "Libelle" => $this->getLibelle(),
                "Icon" => $this->getIcon(),
                "Id" => $this->getId()
            ]);
            return "OK";
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
    /**
     * Récupère tous les categories
     * @param \PDO $bdd
     * @return array
     */
    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare("SELECT * FROM categories");
        $requete->execute();
        //$datas =  $requete->fetchAll(\PDO::FETCH_ASSOC);
        $datas =  $requete->fetchAll(\PDO::FETCH_CLASS,'src\Model\Categorie');
        return $datas;

    }

    public function SqlGetById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("SELECT * FROM categories WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        $requete->setFetchMode(\PDO::FETCH_CLASS,'src\Model\Categorie');
        $categorie = $requete->fetch();

        return $categorie;
    }

    public function SqlDeleteById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("DELETE FROM categories WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        return true;
    }
    public function SqlTruncate(\PDO $bdd){
        $requete = $bdd->prepare("TRUNCATE TABLE categories");
        $requete->execute();
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     * @return Categorie
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->Libelle;
    }

    /**
     * @param mixed $Titre
     * @return Categorie
     */
    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->Icon;
    }

    /**
     * @param mixed $Description
     * @return Categoriee
     */
    public function setIcon($Icon)
    {
        $this->Icon = $Icon;
        return $this;
    }







}