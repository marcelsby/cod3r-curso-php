<?php

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
    loadUtil('variableValidation');

    if (!empty($params)) {
        foreach ($params as $key => $value) {
            if (strlen($key) > 0 && isValidVariableIdentifier($key)) {
                ${$key} = $value;
            }
        }
    }

    require_once(VIEW_PATH . "/{$viewName}.php");
}

function loadTemplateView($viewName, $params = [])
{
    loadUtil('variableValidation');

    if (!empty($params)) {
        foreach ($params as $key => $value) {
            if (strlen($key) > 0 && isValidVariableIdentifier($key)) {
                ${$key} = $value;
            }
        }
    }

    require_once(VIEW_PATH . "/{$viewName}.php");
}
