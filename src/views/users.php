<main class="content">
    <?php
        renderTitle('Cadastro de Usuários', 'Mantenha os dados dos usuários atualizados', 'icofont-users');

        include(TEMPLATE_PATH . '/messages.php');
    ?>

    <a href="save_user.php" class="btn btn-lg btn-primary mb-3">
        Novo Usuário
    </a>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Admissão</th>
            <th>Data de Desligamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->start_date ?></td>
                    <td><?php echo $user->end_date ?? '-' ?></td>
                    <td>
                        <a href="save_user.php?update=<?php echo $user->id ?>" class="btn btn-warning rounded mr-2">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="delete_user.php?id=<?php echo $user->id ?>" class="btn btn-danger rounded mr-2">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>