<?php
include_once "core/engine.php";
$engine = new engine();
include_once "header.php";
if ($engine->getError()) {
    echo "<p>" . $engine->getError() . "</p>";
}
echo $engine->getContentPage();
include_once "footer.php";
?>