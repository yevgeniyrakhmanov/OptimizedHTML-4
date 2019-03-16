<?php
class engine {

    private $_page_file = null;
    private $_error = null;

    public function __construct() {
        if (isset($_GET["page"])) {
            $this->_page_file = $_GET["page"];
            $this->_page_file = str_replace(".", null, $_GET["page"]);
            $this->_page_file = str_replace("/", null, $_GET["page"]);
            $this->_page_file = str_replace("\\", null, $_GET["page"]);

            if (!file_exists("pages/" . $this->_page_file . ".php")) {
                $this->_setError("Шаблон не найден");
                $this->_page_file = "index";
            }
        }
        else $this->_page_file = "index";
    }

    private function _setError($error) {
        $this->_error = $error;
    }

    public function getError() {
        return $this->_error;
    }

    public function getContentPage() {
        return file_get_contents("pages/" . $this->_page_file . ".php");
    }

}