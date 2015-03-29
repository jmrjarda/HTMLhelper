<?php

/**
 * @license BSD 
 * Třída pro psaní webových stránek.
 * Tato třída má pomáhat lidem ,kteří nesnáší html. Plánuju verzi i pro css a rozšíření pro htmlhelper aby v něm byly všechny značky html. 
 * @author Jaroslav Štefáček jaroslavstefacek@seznam.cz
 */
class htmlhelp {

    /**
     *
     * @var array $idlist obsahuje informace o všech id a class na celé stránce  
     */
    private $idlist = array();

    /**
     *
     * @var integer do $idcounter se ukládá počet id a class na stránce 
     */
    private $idcounter = 0;

    /**
     * Tato metoda slouží pro zápis id a class do $idlist.
     * @param string|integer $id   hodnota class nebo id použitelná v css 
     * @param string $type určuje zda se jedná o class nebo id
     */
    public function idblbost($id, $type) {
        if ($id !== "") {
            $this->idlist[$this->idcounter][1] = $id;
            $this->idlist[$this->idcounter][2] = $type;
            $this->idcounter = $this->idcounter + 1;
        }
    }

    /**
     * Vipsání seznamu id a class.
     * tato metoda slouží pro výpis všech id a class na stránce (je možno vytvořit stránku a css řešit potom.hodí se to lidem co zapomínají 
     */
    public function idclasslist() {
        for ($i = 0; $i < $this->idcounter; $i++) {
            echo"<br>";
            echo $this->idlist[$i][1];
            echo"-";
            echo $this->idlist[$i][2];
        }
    }

    /**
     * Vytvoření začátku a konce html.
     * tato metoda vypisuje začátek html a konec. Je to rozdělené proměnnou lom aby bylo možné mezi tagy psát ručně tagy nebo generovat tagy přes htmlhelper
     * @param string|integer $lom určuje zda se jedná o koncoví tag nebo ne
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id  
     */
    public function html($lom = 0, $id = "", $type = "") {
        if ($lom === "/") {
            echo '<' . $lom . 'html>';
        } else {
            echo'<!DOCTYPE html>
   <html ' . $type . '="' . $id . '">';
            $this->idblbost($id, $type);
        }
    }

    /**
     *  Metoda pro vypsání hlavičky. 
     * @param string|integer $lom určuje zda se jedná o koncoví tag nebo ne
     * @param string|integer $title když je vyplněný vípíše se odkaz se zadaným tittlem 
     * @param string $charset pokud nějaký sebevrah nemá rád utf-8 může skusit windows kodování
     * @param integer $css adresa css bez koncovky pokud není vyplněna nic se nevypíše
     */
    public function head($lom = 0, $title = 0, $charset = "UTF-8", $css = 0) {
        if ($lom === "/") {
            echo '<' . $lom . 'head>';
        } else {
            echo '<head >';
            echo '<meta charset="' . $charset . '">';
            if ($title !== 0) {
                echo '<title>' . $title . '</title>';
            }
            if ($css !== 0) {
                echo '<link rel="StyleSheet" type="text/css" href="' . $css . '.css">';
            }
        }
    }

    /**
     * Metoda pro vysání body tagu.
     * @param string|integer $lom určuje zda se jedná o koncoví tag nebo ne
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id 
     */
    public function body($lom = 0, $id = "", $type = "") {
        if ($lom === "/") {
            echo '<' . $lom . 'html>';
        } else {
            echo '<html ' . $type . '="' . $id . '">';
            $this->idblbost($id, $type);
        }
    }

    /**
     * Metoda pro vypsání odstavce.
     * @param string $param text do odstavce
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id 
     */
    public function p($param, $id = "", $type = "") {
        echo '<p ' . $type . '="' . $id . '">';
        echo $param;
        echo '</p>';
        $this->idblbost($id, $type);
    }

    /**
     * Metoda pro psaní nadpisů.
     * @param string $param text nadpisu
     * @param integer $param2 velikost nadpisu 1 největší až 6 nejmenší
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id 
     */
    public function h($param, $param2, $id = "", $type = "") {
        echo '<h' . $param2 . ' ' . $type . '="' . $id . '">';
        echo $param;
        echo '</h' . $param2 . '>';
        $this->idblbost($id, $type);
    }

    /**
     * vypsaní centeru.
     * centrovací tag často nedoporučovaný ,ale bez něj bych nebyl css je horší  jak html
     * @param string|integer $lom určuje zda se jedná o koncoví tag nebo ne
     */
    public function center($lom = 0) {
        if ($lom === "/") {
            echo"</center>";
        } else {
            echo"<center>";
        }
    }

    /**
     * Metoda pro uzavírání bloků html do divu. 
     * @param string|integer $lom určuje zda se jedná o koncoví tag nebo ne
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id  
     */
    public function div($lom = 0, $id = "", $type = "") {
        if ($lom === "/") {
            echo '<' . $lom . 'div>';
        } else {
            echo '<div ' . $type . '="' . $id . '">';
            $this->idblbost($id, $type);
        }
    }

    /**
     * Metoda pro uzavírání bloků html do spanu.
     * @param string|integer $lom určuje zda se jedná o koncoví tag nebo ne 
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id 
     */
    public function span($lom = 0, $id = "", $type = "") {
        if ($lom === "/") {
            echo '<' . $lom . 'div>';
        } else {
            echo '<div ' . $type . '="' . $id . '">';
            $this->idblbost($id, $type);
        }
    }

    /**
     * Metoda pro výpis seznamů. 
     * @param string $seznam seznam hodnot oddělených čárkami
     * @param string $typ ul nebo ol 
     * @param string $id hodnota class nebo id použitelná v css
     * @param string $type určuje zda se jedná o class nebo id
     */
    public function seznam($seznam, $typ, $id = "", $type = "") {
        $pole = explode(";", $seznam);
        echo'<' . $typ . ' ' . $type . '="' . $id . '">';
        for ($i = 0; $i < count($pole); $i++) {
            echo"<li>";
            echo $pole[$i];
            echo"</li>";
        }
        echo'</' . $typ . '>';
        $this->idblbost($id, $type);
    }

    /* dodělat zbytek */
}
