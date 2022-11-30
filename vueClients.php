<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Author" content="Benjamin carpy">

    <title>liste clients</title>
</head>
<h1>Liste des clients</h1>
<br>
<a href="index.php" class="nav-link" aria-current="page"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAXRJREFUWEftl/1NAzEMxV8ngA0KE0AnKGzACGwCbMIKTFA2gBFgA5gA9KoEGV+cODEnndDlv1P88euzz75usLCzWRgP/iXQJYBDUvoawGtE9ahCGeY0QXwACEFFgDRMFiYENQqkYT4TzUlUqRGgEsxVAnkGEILqBbJgciPzPgTVA9SCyT0UgvICeWHCUB6gXpgQVAtoFGYYqgYUhRmCsoD+CqYbqgRUmsC76I4CwLgvYs8VJ7oGstZBq9e8+/RLGU6gdKI3ANtC9LmAmIo5z3POJQC9AzizgHhxmy7vhFIanHZ7GUipyl/9BIAlkUeW7CFdPCaVjo+1UkhnaWf1ma50qWmtmD++I0BcpBfOLqZKN8J2FqCS7JrPKvfsQJbCVuIVKJduVciaY6tCVKD5plRsmr61wchJm//SOOeg2+zX/pJeNaB7AHLAubM5DLnHGH9yWp8VdOKyLX2SOPJOTKgMl2kRprVcRxKGfVoKhRP0Blgc0DeLW4ElGWlZGwAAAABJRU5ErkJggg=="/><!--Home--></a>

<?php
require_once("connexionDB.php");
$sql1 = "SELECT * FROM utilisateur;"; 
$rqt = $cnx->getRequete($sql1);
$res = $rqt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <!-- Liste des clients -->

    <table width='80%' border=0>
        <thead class="table-light">
            <tr bgcolor='#787996'>
                <th scope="col">Id</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Administrateur</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>  
        <?php foreach ($res as $line): ?>
          <tr class='align-bottom'>

            <th scope='row'><?= $line['id'] ?></th>
            <td><?= $line['identifiant_utilisateur'] ?></td>
            <td><?= $line['nom_utilisateur'] ?></td>
            <td><?= $line['prenom_utilisateur'] ?></td>
            <td><?= $line['mail_utilisateur'] ?></td>
            <td><?= $line['tel_utilisateur'] ?></td>
            <td><?= $line['administrateur'] ?></td>
            <td>
                <a href="updateProfileClient.php?id=<?= $line['id'] ?>">🖋</a> |
                <a href="deleteProfile.php?id=<?= $line['id'] ?>">&#128465;</a>
            </td>
       
          <tr>
        <?php endforeach; ?>
      </tbody>

    </table>

    

</body>

</html>