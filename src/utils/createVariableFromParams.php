<?php

if (!empty($params)) {
    loadUtil('variableValidation');

    foreach ($params as $key => $value) {
        if (strlen($key) > 0 && isValidVariableIdentifier($key)) {
            ${$key} = $value;
        }
    }
}
