<?php

interface PersonajeJuego {
    public function atacar();
}

class PersonajeBase implements PersonajeJuego {
    public function atacar() {
        echo "Personaje ataca.\n";
    }
}

abstract class ArmaDecorator implements PersonajeJuego {
    protected $personaje;

    public function __construct(PersonajeJuego $personaje) {
        $this->personaje = $personaje;
    }

    abstract public function atacar();
}

class ArmaEspada extends ArmaDecorator {
    public function atacar() {
        $this->personaje->atacar();
        echo "Con espada.\n";
    }
}

class ArmaArco extends ArmaDecorator {
    public function atacar() {
        $this->personaje->atacar();
        echo "Con arco.\n";
    }
}


$personaje = new PersonajeBase();
// $personajeConEspada = new ArmaEspada($personaje);
// $personajeConEspada->atacar();

$personajeConArco = new ArmaArco($personaje);
$personajeConArco->atacar();

?>