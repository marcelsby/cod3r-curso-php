<div class="titulo">Desafio Data</div>

<?php
class Data
{
    public $dia = 1;
    public $mes = 1;
    public $ano = 1970;

    public function apresentar()
    {
        return "Data: $this->dia/$this->mes/$this->ano";
    }
}

$data1 = new Data();
echo "{$data1->apresentar()}<br>";

$data2 = new Data();
$data2->dia = 17;
$data2->mes = 9;
$data2->ano = 1987;
echo "{$data2->apresentar()}<br>";
