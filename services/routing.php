<?php

require_once 'configs/routesList.php';

function getRoute()
{
    $controllerFolder='controllers/';

    $availableRouteName= array_keys(AVAILABLE_ROUTES);

    if(!isset($_GET['page']) || !in_array($_GET['page'],$availableRouteName)){
        return $controllerFolder. DEFAULT_ROUTE;
    }
    return $controllerFolder. AVAILABLE_ROUTES[ $_GET['page']];
}