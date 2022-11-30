<?php $title = 'Liste Utilisateurs'; ?>
<?php $style = null; ?>
<?php $script = null; ?>

<?php ob_start(); ?>

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
    <?php foreach ($allUser as $user): ?>
        <tr class='align-bottom'>

        <th scope='row'><?= $user->getId() ?></th>
        <td><?= $user->getIdentifiant() ?></td>
        <td><?= $user->getNom() ?></td>
        <td><?= $user->getPrenom() ?></td>
        <td><?= $user->getEmail() ?></td>
        <td><?= $user->getTel() ?></td>
        <td><?= $user->getAdmin() ?></td>
        <td>
            <a href="?index=edituser&amp;id=<?= $user->getId() ?>">🖋</a> |
            <a href="index.php?index=deleteuser&amp;id=<?= $user->getId() ?>">&#128465;</a>
        </td>
    
        <tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../base.tpl.php'; ?>