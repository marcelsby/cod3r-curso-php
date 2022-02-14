<main class="content">
    <?php
        renderTitle('Exclusão de Usuário', 'Confira as informações e delete um usuário do sistema.', 'icofont-user');

        include(TEMPLATE_PATH . '/messages.php');
    ?>
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <fieldset disabled>
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" placeholder="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" type="text" placeholder="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label>Data de Admissão</label>
                <input class="form-control" type="text" placeholder="<?php echo $start_date ?>">
            </div>
            <div class="form-group">
                <label>Data de Desligamento</label>
                <input class="form-control" type="text" placeholder="<?php echo $end_date ?>">
            </div>
            <div class="form-group">
                <label>É administrador(a)?</label>
                <input class="form-control" type="text" placeholder="<?php echo $is_admin ? 'Sim' : 'Não' ?>">
            </div>
            <div class="form-group">
                <label>Possui registros de horas trabalhadas?</label>
                <input class="form-control" type="text" 
                    placeholder="<?php echo $haveWorkingHoursRecords ? 'Sim' : 'Não' ?>">
            </div>
        </fieldset>
        <div>
            <button class="btn btn-danger btn-lg">
                <i class="icofont-ui-delete"></i>
                Excluir
            </button>
            <a href="/users.php" class="btn btn-dark btn-lg">
                <i class="icofont-arrow-left"></i>
                Voltar
            </a>
        </div>
    </form>
</main>