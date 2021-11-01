<div class="titulo">Interface</div>

<?php
interface Animal
{
    public function respirar();
}

interface Mamifero
{
    public function mamar();
}

interface Canino extends Animal, Mamifero
{
    public function latir(): string;
}

interface Felino
{
    public function correr();
}

class Cachorro implements Canino
{
    public function respirar()
    {
        return 'Irei usar oxigênio!';
    }

    public function latir(): string
    {
        return 'Au! Au!<br>';
    }

    public function mamar()
    {
        return 'Irei tomar leite!';
    }

    public function correr()
    {
        return "Vrummmm!";
    }
}

$animal1 = new Cachorro();
echo $animal1->respirar() . '<br>';
echo $animal1->mamar() . '<br>';
echo $animal1->correr() . '<br>';
echo $animal1->latir() . '<br>';

var_dump($animal1);
echo '<br>';

var_dump($animal1 instanceof Cachorro);
echo '<br>';

var_dump($animal1 instanceof Canino);
echo '<br>';

var_dump($animal1 instanceof Mamifero);
echo '<br>';

var_dump($animal1 instanceof Animal);
echo '<br>';
