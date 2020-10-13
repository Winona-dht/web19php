<?php
namespace src\Controller;

use src\Model\BDD;
use src\Model\Categorie;

class CategorieController extends AbstractController
{

    public function Add()
    {
        if ($_POST) {
            $objCategorie = new Categorie();
            $objCategorie->setLibelle($_POST["Libelle"]);
            $objCategorie->setIcon($_POST["Icon"]);
            //Exécuter l'insertion
            $id = $objCategorie->SqlAddcat(BDD::getInstance());
            // Redirection
            header("Location:/categorie/showcat/$id");
        } else {
            return $this->twig->render("Categorie/addcat.html.twig");
        }


    }


    public function All()
    {
        $categories = new Categorie();
        $datas = $categories->SqlGetAll(BDD::getInstance());

        return $this->twig->render("Categorie/allcat.html.twig", [
            "categorieList" => $datas
        ]);
    }

    public function Show($id)
    {
        $categories = new Categorie();
        $datas = $categories->SqlGetById(BDD::getInstance(), $id);

        return $this->twig->render("Categorie/showcat.html.twig", [
            "categorie" => $datas
        ]);
    }

    public function Delete($id)
    {
        $categories = new Categorie();
        $datas = $categories->SqlDeleteById(BDD::getInstance(), $id);

        header("Location:/Categorie/All");
    }

    public function Update($id)
    {
        $categories = new Categorie();
        $datas = $categories->SqlGetById(BDD::getInstance(), $id);

        if ($_POST) {
            $objCategorie = new Categorie();
            $objCategorie->setLibelle($_POST["Libelle"]);
            $objCategorie->setIcon($_POST["Icon"]);

            $objCategorie->setId($id);
            //Exécuter la mise à jour
            $objCategorie->SqlUpdatecat(BDD::getInstance());
            // Redirection
            header("Location:/categorie/show/$id");
        } else {
            return $this->twig->render("Categorie/updatecat.html.twig", [
                "categorie" => $datas
            ]);
        }

    }

}





