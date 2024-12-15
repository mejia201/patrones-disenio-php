<?php
interface MetodoSalida {
    public function mostrar($mensaje);
}

class SalidaConsola implements MetodoSalida {
    public function mostrar($mensaje) {
        echo "Mensaje en consola: $mensaje\n";
    }
}

class SalidaJson implements MetodoSalida {
    public function mostrar($mensaje) {
        echo "Mensaje en JSON: " . json_encode(["mensaje" => $mensaje]) . "\n";
    }
}

class SalidaTxt implements MetodoSalida {
    public function mostrar($mensaje) {
        echo "Mensaje en TXT: $mensaje\n";
    }
}

class MensajeContext {
    private $strategy;

    public function setStrategy(MetodoSalida $strategy) {
        $this->strategy = $strategy;
    }

    public function mostrarMensaje($mensaje) {
        $this->strategy->mostrar($mensaje);
    }
}


$contexto = new MensajeContext();

$contexto->setStrategy(new SalidaConsola());
$contexto->mostrarMensaje("Hola Mundo desde consola");

$contexto->setStrategy(new SalidaJson());
$contexto->mostrarMensaje("Hola Mundo desde json");

$contexto->setStrategy(new SalidaTxt());
$contexto->mostrarMensaje("Hola Mundo desde txt");

?>