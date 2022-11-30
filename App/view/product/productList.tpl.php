<?php $title = 'Liste Produits'; ?>
<?php $style = null; ?>
<?php $script = null; ?>

<?php ob_start(); ?>

<table class="table table-bordered" width="60%">

      <thead class="table-light">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Categorie</th>
          <th scope="col">Nom</th>
          <th scope="col">Prix</th>
          <th scope="col">Stock</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>  
        <?php foreach ($allProduct as $product): ?>
          <tr class='align-bottom'>

            <th scope='row'><?= $line->getId() ?></th>
            <td><?= $line->getIdCategorieProd() ?></td>
            <td><?= $line->getNomProd() ?></td>
            <td><?= $line->getPrix() ?></td>
            <td><?= $line->getStock() ?></td>
            <td>
                <a href="?index=editproduit&amp;id=<?= $line->getId() ?>">🖋</a> |
                <a href="?index=deleteproduit&amp;id=<?= $line->getId() ?>" onclick="myFunction()">&#128465;</a>
                <script>
                  function myFunction() {
                    alert("Êtes-vous certain(e) ?");
                  }
                </script>
            </td>
            
       
          <tr>
        <?php endforeach; ?>
      </tbody>
    </table>