<h2>Lista de Usuários</h2>

<a href="/users/create">Novo Usuário</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['user_name'] ?></td>
            <td>
                <a href="/users/edit/<?= $user['id'] ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>