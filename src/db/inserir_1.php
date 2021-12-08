<div class="titulo">Inserir Registro #01</div>

<?php

require_once 'conexao.php';

$sql = "INSERT INTO cadastro 
        (nome, nascimento, email, site, filhos, salario)
        VALUES 
        (
            'Marieta',
            '1989-10-29',
            'marieta123@email.com.br',
            'https://marieta123.sites.com.br',
            2,
            13000.87
        ), 
        (
            'João Cardoso',
            '1970-09-12',
            'joaocardoso321@email.com.br',
            'https://joaocardoso.com.br',
            0,
            3500.91
        ),
        (
            'Madalena de Jesus',
            '1980-12-03',
            'madalenadejesus@gmail.br',
            'https://madalenadejesus.com.br',
            0,
            4350.50
        ),
        (
            'João Carvalho Mendes',
            '1993-05-17',
            'joaocarvalhomendes@gmail.br',
            'https://joaocarvalhomendes.com.br',
            0,
            5930.80
        )";

$conexao = novaConexao();

$resultado = $conexao->query($sql);

if ($resultado) {
    echo 'Sucesso :) <br>';
} else {
    echo 'Erro: ' . $conexao->error . '<br>';
}

$conexao->close();
