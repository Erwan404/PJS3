<?php
if (preg_match('^/page-([0-9]+).html$',£_SERVER['REDIRECT_URL'],$match))
{
header("Status: 200 Ok",false,200);

include('page.php');
}
else
{
require('vue/erreur404.tpl');
}
?>
