<?php
class HomeController extends Controller {
    public function index() {
        try {
            $Produit = new Produit();
            $Categorie = new Categorie();

            $produits = $Produit->getAll();
            $categories = $Categorie->getAll();

            $this->view('home', ['title'=>'Boutique en ligne - Accueil', 'produits'=> $produits, 'categories'=> $categories]);
        } catch (Throwable $e) {
            http_response_code(500);
            echo "View Rendering Error: " . htmlspecialchars($e->getMessage());
        }
    }
}
