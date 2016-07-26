<?php
namespace TextTreatment;

require_once("AutoLoad.php");

use Classes;

echo '<h1>Tratamento de Texto</h1>';

$texto1 = "Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.";

$nome1 = "temístocles de arêa matos e silva";

$nome2 = "TEMÍSTOCLES DE ARÊA MATOS E SILVA";

$nome3 = "([éloi de maretê a silva môragÃo])";

$txt1 = new Classes\TextTreatment($nome1);

var_dump($txt1);

echo '<br>';
echo '<b>properNames:</b><br>';
echo $txt1->properNames();
echo '<hr>';

$txt1->setStr($texto1);

echo '<b>allUppercase:</b><br>';
echo $txt1->allUppercase();
echo '<hr>';
echo '<b>allLowercase:</b><br>';
echo $txt1->allLowercase();
//$textoM = $txt1->allLowercase();
echo '<hr>';
echo '<b>firtWordUppercase:</b><br>';
echo $txt1->firstWordUppercase();
echo '<hr>';
//$txt1->setStr($textoM);
echo '<b>firstSentenceUppercase:</b><br>';
echo $txt1->firstSentenceUppercase();
echo '<hr>';
echo '<b>properNames:</b><br>';
echo $txt1->properNames();
echo '<hr>';
echo '<b>limitText:</b><br>';
echo $txt1->limitText();
echo '<hr>';
echo '<b>sanitizeString:</b><br>';
echo $txt1->sanitizeString();
echo '<hr>';

$txt1->setStr($nome3);

echo '<hr>';
echo '<b>Nome:</b><br>';
echo $txt1->getStr();
echo '<hr>';
echo '<b>allUpercase:</b><br>';
echo $txt1->allUppercase();
echo '<hr>';
echo '<b>allLowercase:</b><br>';
echo $txt1->allLowercase();
//$textoM = $txt1->allLowercase();
echo '<hr>';
echo '<b>firtWordUppercase:</b><br>';
echo $txt1->firstWordUppercase();
echo '<hr>';
//$txt1->setStr($textoM);
echo '<b>firstSentenceUppercase:</b><br>';
echo $txt1->firstSentenceUppercase();
echo '<hr>';
echo '<b>properNames:</b><br>';
echo $txt1->properNames();
echo '<hr>';
echo '<b>limitText:</b><br>';
echo $txt1->limitText(10);
echo '<hr>';
echo '<b>sanitizeString:</b><br>';
echo $txt1->sanitizeString(true);
echo '<br>';