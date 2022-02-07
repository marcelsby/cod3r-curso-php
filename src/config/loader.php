<?php

const CREATE_VARIABLE_FROM_PARAMS_FILE = UTILS_PATH . '/create_variable_from_params.php';

function loadModel($modelName)
{
    require_once(MODEL_PATH . "/{$modelName}.php");
}

function loadUtil($utilName)
{
    require_once(UTILS_PATH . "/{$utilName}.php");
}

function loadView($viewName, $params = [])
{
    require_once(CREATE_VARIABLE_FROM_PARAMS_FILE);

    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplatedView($viewName, $params = [])
{
    require_once(CREATE_VARIABLE_FROM_PARAMS_FILE);

    $user = $_SESSION['user'];
    $workingHours = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));
    $workedInterval = $workingHours->getWorkedInterval()->format('%H:%I:%S');
    $exitTime = $workingHours->getExitTime()->format('H:i:s');
    $activeClock = $workingHours->getActiveClock();

    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/left.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");
}

function renderTitle(string $title, string $subtitle, string $icon = null)
{
    require_once(TEMPLATE_PATH . '/title.php');
}
