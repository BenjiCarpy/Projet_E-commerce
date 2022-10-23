

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <link rel="icon" href="media\icon\icon.ico" >
    <title>Liste</title>


    <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pushster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/carousel.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d0217dd888.js" crossorigin="anonymous"></script>

    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;

      
      }


      /* Scrollbar */

      ::-webkit-scrollbar {

      width: 8px;

      }

      ::-webkit-scrollbar-track {

      border-radius: 10px;

      }

      ::-webkit-scrollbar-thumb {

      border-radius: 10px;
      background-color: gray;

      }

      ::-webkit-scrollbar-thumb:hover {

      background-color:black;

      }


      .imgProd{
        width: 100%;
        height:225px;
        object-fit: contain;

      }

      .mb-4 {
        margin-bottom: 1rem!important; 
      }

      .py-5 {
        padding-top: 3.5rem!important; 
        padding-bottom: 3rem!important;
      }

      .py-4 {
        padding-top: 1.5rem!important;
        padding-bottom: 0rem!important; 
      }

      .my-4 {
        margin-top: 1.5rem!important;
        margin-bottom: 0rem!important; 
      }
      button, a{
        text-decoration: none;
      }

      .fs-4{
        font-family: 'Pushster', cursive;
        font-weight: 700;
        font-size: 16px;
      }

      .btns{
        background: transparent;
        border: none;
        outline: none;
        color: grey;
      }

      .btns i:hover{
        cursor: pointer;
      }

      .form-select:hover{
        text-decoration: underline;
      }

    </style>

    
  </head>



<body>
  <header>
  <!-- En-tête  -->
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="media\icon\icon.ico" alt="logo" width="50px" height="50px">
            <span class="fs-4">Wall-it</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="panier.php" class="nav-link">Panier</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Favoris</a></li>
            <li class="nav-item"><a href="formulaire.php" class="nav-link">Compte</a></li>
        </ul>
        </header>
    </div>
</header>
<?php 
require_once("connexionDB.php");
$sql1 = "SELECT * FROM produit;"; 
$rqt = $cnx->getRequete($sql1);
$res = $rqt->fetchAll(PDO::FETCH_ASSOC);

?>

<div>

<h2>Liste des produits</h2>
<a title='Ajouter' href='addProduit.php'>Ajouter&#43</a>

<article>

  <div class="table-responsive-sm">
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
        <?php foreach ($res as $line): ?>
          <tr class='align-bottom'>

            <th scope='row'><?= $line['id'] ?></th>
            <td><?= $line['id_categorie_prod'] ?></td>
            <td><?= $line['nom_prod'] ?></td>
            <td><?= $line['prix'] ?></td>
            <td><?= $line['stock'] ?></td>
            <td>
                <a href="updateProduit.php?id=<?= $line['id'] ?>">🖋</a> |
                <a href="deleteProduit.php?id=<?= $line['id'] ?>">&#128465;</a>
            </td>
       
          <tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
                <?php /*
                      require_once('connexionDB.php');
                  foreach ($res as $line) {	
                      $id=$line['id'];
                      var_dump($id);
                      echo "<tr class='align-bottom'>";
                      echo " <th scope='row'>".$line['id']."</th>";
                      echo "<td>".$line['id_categorie_prod']."</td>";
                      echo "<td>".$line['nom_prod']."</td>";
                      echo "<td>".$line['prix']."</td>";
                      echo "<td>".$line['stock']."</td>";
                      echo "<td>
                              <a href=\"?action=modifier&val=$line[id]\">🖋</a> |
                              <a href=\"?action=supprimer&val=".$line['id']."\">&#128465;</a>
                          </td>";
                      echo "<tr>";		
                  }
                  //var_dump($id);*/
            ?>
<!--</tbody></table></div>-->
</article>
</div>

</div>

</body>
</html>