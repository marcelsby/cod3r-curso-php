<div class="titulo">If Else</div>

<?php

if (true) {
    echo "Serei impresso?<br>";
}

if (true) {
    echo "Verdadeiro - Parte A<br>";
    echo "Verdadeiro - Parte B<br>";
} else {
    echo "Falso - Parte A<br>";
    echo "Falso - Parte B<br>";
}

if (false) {
    echo "Passo A<br>";
} elseif (true) {
    echo "Passo B<br>";
} else {
    echo "Último passo<br>";
}
