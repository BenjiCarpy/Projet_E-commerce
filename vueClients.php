<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Author" content="Benjamin carpy">

    <title>Document</title>
</head>
<h1>Liste des clients</h1>
<br>

<body>
    <!-- Liste des clients -->
    <?php
    echo "<a href=\"register.php?id=$lig[id]\">S'inscrire</a> <br>  <a href=\"connexionDB.php?id=$lig[id]\">Connection</a>";
    ?>
    <table width='80%' border=0>
        
        <tr bgcolor='#787996'>
            <th>Id</th>
            <th>Pseudo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>

        </tr>

        <?php
        include_once("connexionDB.php");
        $cnx1 = new Connexiondb();
        $resultat = $cnx1->getRequete("SELECT id,identifiant_utilisateur,nom_utilisateur,prenom_utilisateur,mail_utilisateur,tel_utilisateur FROM utilisateur ORDER BY id;");
        foreach ($resultat as $lig) {
            echo "<tr>";
            echo "<td>" . $lig['id'] . "</td>";
            echo "<td>" . $lig['identifiant_utilisateur'] . "</td>";
            echo "<td>" . $lig['nom_utilisateur'] . "</td>";
            echo "<td>" . $lig['prenom_utilisateur'] . "</td>";
            echo "<td>" . $lig['mail_utilisateur'] . "</td>";
            echo "<td>" . $lig['tel_utilisateur'] . "</td>";
            echo "</tr>";
        }

        ?>

    </table>

    

</body>

</html>