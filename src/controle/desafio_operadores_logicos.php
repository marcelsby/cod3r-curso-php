<div class="titulo">Desafio Operadores Lógicos</div>

<!--
    Dois trabalhos -> terça e quinta!
    - Se os dois forem executados -> TV 50' e sorvete
    - Se apenas um for executado -> TV 32' e sorvete
    - Se nenhum for executado -> Ficar em casa, mais saudável!
-->

<form action="#" method="POST">
    <div>
        <label for="t1">Trabalho 1 (Terça):</label>
        <select name="t1" id="t1">
            <option value="1">Executado</option>
            <option value="0">Não executado</option>
        </select>
    </div>
    <div>
        <label for="t2">Trabalho 2 (Quinta):</label>
        <select name="t2" id="t2">
            <option value="1">Executado</option>
            <option value="0">Não executado</option>
        </select>
    </div>
    <button>Executar</button>
</form>

<style>
button, select {
    font-size: 1.8rem;
}
</style>

<?php
if (isset($t1) && isset($t2)) {
    $t1 = (bool) $_POST['t1'];
    $t2 = !!$_POST['t2'];

    if ($t1 && $t2) {
        echo 'TV 50" e sorvete. Eba!';
    } elseif ($t1 xor $t2) {
        echo 'TV 32" e sorvete.';
    } else {
        echo 'Vamos ficar em casa, é mais saudável!';
    }
};
