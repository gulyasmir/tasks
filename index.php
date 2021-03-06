<?php
spl_autoload_register('autoLoader');

function autoLoader() {
    $libs = ['database','session','bootstrap','controller','model','view'];
    $count_libs = count($libs);
    for ($i=0;$i<$count_libs;$i++){
        require 'libs/'.$libs[$i].'.php';
    }

    $config = ['paths','database','config'];
    $count_config = count($config);
    for ($i=0;$i<$count_config;$i++){
        require 'config/'.$config[$i].'.php';
    }
}

$app = new Bootstrap();