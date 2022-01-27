<?php

if (!empty($params)) {
    loadUtil('variable_validation');

    foreach ($params as $key => $value) {
        if (strlen($key) > 0 && isValidVariableIdentifier($key)) {
            ${$key} = $value;
        }
    }
}
