<div class="titulo">Tipo String</div>

<?php
echo 'Eu sou uma string';
echo '<br>';

var_dump("Eu também");
echo '<br>';

// Concatenação
echo "Nós também" . ' somos';
echo '<br>', "Também aceito", " virgulas"; // !!! Vírgulas funcionam no contexto do echo
echo '<br>';

echo "'Teste' ", '"Teste" ', '\'Teste\' ', "\"Teste\"", ' \\';

print('<br>Também existe a função print');
print '<br>Também existe a função print sem parênteses';
echo ('<br>E também o echo com parênteses'); // Não é uma boa prática, pois em determinados cenários pode causar erros
echo '<br>';

// Algumas funções
echo '<br>' . strtoupper('maximizado');
echo '<br>' . strtolower('MINIMIZADO');
echo '<br>' . ucfirst('só a primeira letra');
echo '<br>' . ucwords('todas as palavras');
echo '<br>' . strlen('Quantas letras?');
echo '<br>' . mb_strlen("Eu também", "UTF-8");
echo '<br>' . substr('Só uma parte mesmo', 7, 6);
echo '<br>' . str_replace('isso', 'aquilo', 'Trocar isso isso');
