<?php
class HomeController extends Controller {
    public function index() {
        try {
            $Produit = new Produit();
            $Categorie = new Categorie();

            $Produits = $Produit->getAll();
            $Categories = $Categorie->getAll();

            $this->view('home', []);
        } catch (Throwable $e) {
            http_response_code(500);
            echo "View Rendering Error: " . htmlspecialchars($e->getMessage());
        }
    }
}
