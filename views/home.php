<main>
    <div class="container"> 
        <?php foreach($produits as $produit): ?>
            <card-produit
                title="<?= htmlspecialchars($produit["nom"]) ?>"
                url="<?= htmlspecialchars($produit["id"]) ?>"
                img="<?= htmlspecialchars($produit["image"] ?? '') ?>"
                categorie="<?= htmlspecialchars($produit["categorie_nom"]) ?>"
                description="<?= htmlspecialchars($produit["description"]) ?>"
                quantite="<?= htmlspecialchars($produit["quantite"]) ?>"
                prix="<?= htmlspecialchars($produit["prix"]) ?>"
            ></card-produit>
        <?php endforeach ?>
    </div>
</main>