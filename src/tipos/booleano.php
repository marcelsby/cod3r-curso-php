<div class="titulo">Tipo Booleano</div>

<?php
echo true;
echo '<br>';
echo false;

echo '<br>' . var_dump(true);
echo '<br>' . var_dump(false);
echo '<br>' . var_dump('false');
echo '<br>' . is_bool(false);
echo '<br>' . is_bool('true');

// converter valores para booleano
echo '<p>Regras:</p>';
echo '<br>' . var_dump((bool) 0); // dos números o zero é o único que resolve em false
echo '<br>' . var_dump((bool) 20);
echo '<br>' . var_dump((bool)  -1);
echo '<br>' . var_dump((bool) 0.0); // false
echo '<br>' . var_dump((bool) 0.00000000001);
echo '<br>' . var_dump((bool) ""); // false
echo '<br>' . var_dump((bool) " ");
echo '<br>' . var_dump((bool) "0"); // false
echo '<br>' . var_dump((bool) "00");

// Conversão com dupla negação
echo '<br>' . var_dump(!!"false");
