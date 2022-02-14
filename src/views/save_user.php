<main class="content">
    <?php
        renderTitle('Cadastro de Usuário', 'Crie ou atualize um usuário', 'icofont-user');

        include(TEMPLATE_PATH . '/messages.php');
    ?>

    <form action="#" method="post">
        <?php if (isset($id)) : ?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
        <?php endif ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Informe o nome" 
                    class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : '' ?>"
                    value="<?php echo isset($name) ? $name : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['name'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Informe o e-mail" 
                    class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"
                    value="<?php echo isset($email) ? $email : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" 
                    placeholder="<?php echo isset($_GET['update']) ? 'Informe a nova senha' : 'Informe uma senha' ?>"
                    class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="password_confirmation">Confirmação de Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                    placeholder="<?php echo isset($_GET['update']) ? 'Confirme a nova senha' : 'Confirme a senha' ?>"
                    class="form-control <?php echo isset($errors['password_confirmation']) ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password_confirmation'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de Admissão</label>
                <input type="date" id="start_date" name="start_date"
                    class="form-control <?php echo isset($errors['start_date']) ? 'is-invalid' : '' ?>"
                    value="<?php echo isset($start_date) ? $start_date : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['start_date'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">Data de Desligamento</label>
                <input type="date" id="end_date" name="end_date"
                    class="form-control <?php echo isset($errors['end_date']) ? 'is-invalid' : '' ?>"
                    value="<?php echo isset($end_date) ? $end_date : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['end_date'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="is_admin">É administrador(a)?</label>
                <div class="form-check mb-3">
                    <input type="checkbox" id="is_admin" name="is_admin"
                        class="form-check-input <?php echo isset($errors['is_admin']) ? 'is-invalid' : '' ?>"
                        <?php echo isset($is_admin) && $is_admin ? 'checked' : '' ?>>
                </div>
                <div class="invalid-feedback">
                    <?php echo $errors['is_admin'] ?>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary btn-lg">
                <i class="icofont-check"></i>
                Salvar
            </button>
            <a href="/users.php" class="btn btn-dark btn-lg">
                <i class="icofont-arrow-left"></i>
                Voltar
            </a>
        </div>
    </form>
</main>