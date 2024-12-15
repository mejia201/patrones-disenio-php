<?php


interface Personaje {
    public function ataque();
    public function velocidad();
}

class Esqueleto implements Personaje {
    public function ataque() {
        echo "Ataque de Esqueleto: Golpe con espada.\n";
    }
    public function velocidad() {
        echo "Velocidad de Esqueleto: Lento.\n";
    }
}

class Zombi implements Personaje {
    public function ataque() {
        echo "Ataque de Zombi: Golpe con lanza.\n";
    }
    public function velocidad() {
        echo "Velocidad de Zombi: Lento pero constante.\n";
    }
}

abstract class CreadorPersonaje {
    abstract public function crearPersonaje();
}

class CreadorNivelFacil extends CreadorPersonaje {
    public function crearPersonaje() {
        return new Esqueleto();
    }
}

class CreadorNivelDificil extends CreadorPersonaje {
    public function crearPersonaje() {
        return new Zombi();
    }
}


$nivel = 'dificil';  // o 'facil' 'dificil'
$creador = ($nivel == 'facil') ? new CreadorNivelFacil() : new CreadorNivelDificil();
$personaje = $creador->crearPersonaje();
$personaje->ataque();
$personaje->velocidad();


?>