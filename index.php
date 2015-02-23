<?php
require "htmlhelper.php"; 
$s=new htmlhelp;
$s->html();
$s->head(0,"test","UTF-8","test");
$s->head("/"); 
$s->body();

$s->h("testovací stránky", 1 , "hlavni");
$s->p("testovací stránka pomocí htmlhelperu","odstavec1");
$s->seznam("zaznam1;zaznam2","ol","seznam","class");
//$s->idclasslist();

$s->body("/");
$s->html("/");
?>



