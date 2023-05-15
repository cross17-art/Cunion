<?php
// =============================================================================
// INDEX.PHP
// =============================================================================

global $query;
if (is_search()) include_once(EXECOORE_PATH . "/inc/search.php");
else include_once(EXECOORE_PATH . "/template-base.php");

?>