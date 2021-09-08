<?php

use voku\helper\AntiXSS;

require_once __DIR__ . '/vendor/autoload.php';

class Solution
{
  static public function search($query)
  {
    $antiXSS = new AntiXSS();
    return $antiXSS->xss_clean($query);
  }
}
