<?php

/**
 * tato třída má pomáhat lidem ,kteří nesnáší html. Plánuju verzi i pro css a rozšíření pro htmlhelper aby v něm byly všechny značky html. 
 * @author Jaroslav Štefáček jaroslavstefacek@seznam.cz
 */
class htmlhelp {

    /**
     *
     * @var type $idlist obsahuje informace o všech id a class na celé stránce
     * @var type do $idcounter se ukládá počet id a class na stránce  
     */
    private $idlist = array();
    private $idcounter = 0;

    /**
     * 
     * @param type $id   hodnota class nebo id použitelná v css 
     * @param type $type určuje zda se jedná o class nebo id
     * tato metoda slouží pro zápis id a class do $idlist
     */
    public function idblbost($id, $type) {
        if ($id !== "") {
            $this->idlist[$this->idcounter][1] = $id;
            $this->idlist[$this->idcounter][2] = $type;
            $this->idcounter = $this->idcounter + 1;
        }
    }

    /**
     * tato metoda slouží pro výpis všech id a class na stránce (je možno vytvořit stránku a css řešit potom.hodí se to lidem co zapomínají 
     */
    public function idclasslist() {
        for ($i = 0; $i < $this->idcounter; $i++) {
            echo"<br>";
            echo $this->idlist[$i][1];
            echo"-";
            echo  $this->idlist[$i][2];
        }
    }

    /**
     * 
     * @param type $lom určuje zda se jedná o koncoví tag nebo ne
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * tato metoda vypisuje začátek html a konec. Je to rozdělené proměnnou lom aby bylo možné mezi tagy psát ručně tagy nebo generovat tagy přes htmlhelper
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
     * 
     * @param type $lom určuje zda se jedná o koncoví tag nebo ne
     * @param type $title když je vyplněný vípíše se odkaz se zadaným tittlem 
     * @param type $charset pokud nějaký sebevrah nemá rád utf-8 může skusit windows kodování
     * @param type $css adresa css bez koncovky pokud není vyplněna nic se nevypíše
     * metoda pro vypsání hlavičky 
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
     * 
     * @param type $lom určuje zda se jedná o koncoví tag nebo ne
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * metoda pro vysání body tagu
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
     * 
     * @param type $param text do odstavce
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * metoda pro vypsání odstavce
     */
    public function p($param, $id = "", $type = "") {
        echo '<p ' . $type . '="' . $id . '">';
        echo $param;
        echo '</p>';
        $this->idblbost($id, $type);
    }

    /**
     * 
     * @param type $param text nadpisu
     * @param type $param2 velikost nadpisu 1 největší až 6 nejmenší
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * metoda pro psaní nadpisů
     */
    public function h($param, $param2, $id = "", $type = "") {
        echo '<h' . $param2 . ' ' . $type . '="' . $id . '">';
        echo $param;
        echo '</h' . $param2 . '>';
        $this->idblbost($id, $type);
    }

    /**
     * 
     * @param type $lom určuje zda se jedná o koncoví tag nebo ne
     * centrovací tag často nedoporučovaný ,ale bez něj bych nebyl css je horší  jak html
     */
    public function center($lom = 0) {
        if ($lom === "/") {
            echo"</center>";
        } else {
            echo"<center>";
        }
    }

    /**
     * 
     * @param type $lom určuje zda se jedná o koncoví tag nebo ne
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * metoda pro uzavírání bloků html do divu 
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
     * 
     * @param type $lom určuje zda se jedná o koncoví tag nebo ne 
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * metoda pro uzavírání bloků html do spanu
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
     * 
     * @param type $seznam seznam hodnot oddělených čárkami
     * @param type $typ ul nebo ol 
     * @param type $id hodnota class nebo id použitelná v css
     * @param type $type určuje zda se jedná o class nebo id 
     * metoda pro výpis seznamů 
     */
    public function seznam($seznam,$typ,$id="",$type="") {
        $pole=  explode(";", $seznam);
        echo'<'.$typ.' ' . $type . '="' . $id . '">';
        for($i=0;$i<count($pole);$i++){
            echo"<li>";
            echo $pole[$i];
            echo"</li>";
        }
        echo'</'.$typ.'>';
        $this->idblbost($id, $type);
    }
    
    /* dodělat zbytek */

}
