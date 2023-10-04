<?php
require_once "./mvc/views/components/adHeader/adHeader.php";

require_once "./mvc/views/components/" . $data["folder"] . "/" . $data["file"] . ".php";

require_once "./mvc/views/components/adFooter/adFooter.php";
