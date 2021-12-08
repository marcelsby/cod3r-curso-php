<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<div class="titulo">Alterar Registro</div>

<?php
ini_set('display_errors', 0);

require_once 'conexao.php';
$conexao = novaConexao();

if (isset($_GET['codigo'])) {
    $sql = "SELECT * FROM cadastro WHERE id = ?";
    $statement = $conexao->prepare($sql);
    $statement->bind_param("i", $_GET['codigo']);

    if ($statement->execute()) {
        $resultado = $statement->get_result();

        if ($resultado->num_rows > 0) {
            $dados = $resultado->fetch_assoc();
            if ($dados['nascimento']) {
                $dt = new DateTime($dados['nascimento']);
                $dados['nascimento'] = $dt->format('d/m/Y');
            }

            if ($dados['salario']) {
                $dados['salario'] = str_replace('.', ',', $dados['salario']);
            }
        }
    }
}

if (!empty($_POST)) {
    $dados = $_POST;
    $erros = array();

    if (trim($dados['nome']) === "") {
        $erros['nome'] = 'Nome é obrigatório';
    }

    if (isset($dados['nascimento'])) {
        $data = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);

        if (!$data) {
            $erros['nascimento'] = 'Data deve estar no padrão dd/mm/aaaa';
        }
    }

    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido';
    }

    if (!filter_var($dados['site'], FILTER_VALIDATE_URL)) {
        $erros['site'] = 'Site inválido';
    }

    $filhosConfig = [
        'options' => ['min_range' => 0, 'max_range' => 20]
    ];

    if (!filter_var($dados['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $dados['filhos'] != 0) {
        $erros['filhos'] = 'Quantidade de filhos inválida. (0-20)';
    }

    $salarioConfig = ['options' => ['decimal' => ',']];

    if (!filter_var($dados['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)) {
        $erros['salario'] = 'Salário inválido';
    }

    if (empty($erros)) {
        $sql = "UPDATE cadastro 
                SET nome = ?,
                    nascimento = ?,
                    email = ?,
                    site = ?,
                    filhos = ?,
                    salario = ?
                WHERE id = ?";

        $statement = $conexao->prepare($sql);
        $params = [
            $dados['nome'],
            $data ? $data->format('Y-m-d') : null,
            $dados['email'],
            $dados['site'],
            $dados['filhos'],
            $dados['salario'] ? str_replace(',', '.', $dados['salario']) : null,
            $_GET['codigo']
        ];

        $statement->bind_param('ssssidi', ...$params);
        $resultado = $statement->execute();

        if ($resultado) {
            unset($dados);
        }
    }
}
?>

<h2>Atualizar Cadastro</h2>
<form action="/exercicio.php" method="get">
    <input type="hidden" name="dir" value="db">
    <input type="hidden" name="file" value="alterar">
    <div class="form-group row">
        <div class="col-sm-10">
            <input type="number" name="codigo"
                class="form-control"
                value="<?php echo $_GET['codigo'] ?>" 
                placeholder="Informe o código para consultar">
        </div>
        <div class="col-sm-2">
            <button class="btn btn-success mb-4">Consultar</button>
        </div>
    </div>
</form>

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
                value="<?php echo $dados['nome'] ?>">
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
                value="<?php echo $dados['nascimento'] ?>">
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
                value="<?php echo $dados['email'] ?>">
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
                value="<?php echo $dados['site'] ?>">
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
                value="<?php echo $dados['filhos'] ?>">
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
                value="<?php echo $dados['salario'] ?>">
            <div class="invalid-feedback">
                <?php echo $erros['salario'] ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
</form>
