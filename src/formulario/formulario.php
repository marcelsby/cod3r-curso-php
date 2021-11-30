<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<div class="titulo">Formulário</div>

<?php
ini_set('display_errors', 0);

if (!empty($_POST)) {
    $erros = array();

    if (!filter_input(INPUT_POST, 'nome')) {
        $erros['nome'] = 'Nome é obrigatório';
    }

    if (filter_input(INPUT_POST, 'nascimento')) {
        $data = DateTime::createFromFormat('d/m/Y', $_POST['nascimento']);

        if (!$data) {
            $erros['nascimento'] = 'Data deve estar no padrão dd/mm/aaaa';
        }
    }

    if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido';
    }

    if (!filter_input(INPUT_POST, 'site', FILTER_VALIDATE_URL)) {
        $erros['site'] = 'Site inválido';
    }

    $filhosConfig = [
        'options' => ['min_range' => 0, 'max_range' => 20]
    ];

    if (!filter_var($_POST['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $_POST['filhos'] != 0) {
        $erros['filhos'] = 'Quantidade de filhos inválida. (0-20)';
    }

    $salarioConfig = ['options' => ['decimal' => ',']];

    if (!filter_var($_POST['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)) {
        $erros['salario'] = 'Salário inválido';
    }
}
?>

<!-- <?php foreach ($erros as $erro) : ?>
    <div class="alert alert-danger" role="alert">
        <?php // echo $erro?>
    </div>
<?php endforeach ?> -->

<h2>Cadastro</h2>
<form action="#" method="post">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="nome">Nome</label>
            <input 
                type="text" 
                name="nome" 
                id="nome" 
                placeholder="Ex: João da Silva" 
                class="form-control <?php echo $erros['nome'] ? 'is-invalid' : '' ?>"
                value="<?php echo $_POST['nome'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['nome'] ?>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="nascimento">Data de nascimento</label>
            <input 
                type="text" 
                name="nascimento" 
                id="nascimento" 
                placeholder="Ex: 01/07/2005" 
                class="form-control <?php echo $erros['nascimento'] ? 'is-invalid' : '' ?>"
                value="<?php echo $_POST['nascimento'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['nascimento'] ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input 
                type="text" 
                name="email" 
                id="email" 
                placeholder="Ex: joao@gmail.com" 
                class="form-control <?php echo $erros['email'] ? 'is-invalid' : '' ?>"
                value="<?php echo $_POST['email'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['email'] ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="site">Site</label>
            <input 
                type="text" 
                name="site" 
                id="site" 
                placeholder="Ex: http://www.joaodasilva.com.br" 
                class="form-control <?php echo $erros['site'] ? 'is-invalid' : '' ?>"
                value="<?php echo $_POST['site'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['site'] ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="filhos">Quantidade de Filhos</label>
            <input 
                type="number" 
                name="filhos" 
                id="filhos" 
                placeholder="Ex: 5" 
                class="form-control <?php echo $erros['filhos'] ? 'is-invalid' : '' ?>"
                value="<?php echo $_POST['filhos'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['filhos'] ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="salario">Salário</label>
            <input 
                type="text" 
                name="salario" 
                id="salario" 
                placeholder="Ex: 1800,78" 
                class="form-control <?php echo $erros['salario'] ? 'is-invalid' : '' ?>"
                value="<?php echo $_POST['salario'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['salario'] ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
</form>