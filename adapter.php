<?php

interface InterfazArchivo {
    public function abrir();
}

class ArchivoWindows7 {
    public function abrirWindows7() {
        echo "Abriendo archivo en Windows 7.\n";
    }
}

class AdaptadorWindows10 implements InterfazArchivo {
    private $archivoWindows7;

    public function __construct(ArchivoWindows7 $archivoWindows7) {
        $this->archivoWindows7 = $archivoWindows7;
    }

    public function abrir() {
        echo "Adaptando...\n";
        $this->archivoWindows7->abrirWindows7();
    }
}


$archivo7 = new ArchivoWindows7();
$adaptador = new AdaptadorWindows10($archivo7);
$adaptador->abrir();


?>