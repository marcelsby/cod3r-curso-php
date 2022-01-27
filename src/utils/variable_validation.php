<?php

/**
 * Validate if a given string is a valid PHP variable identifier.
 *
 * @link https://www.php.net/manual/pt_BR/language.variables.basics.php
 *
 * @param string $evalString String to be evaluated.
 *
 * @return bool It returns TRUE if the evaluated string is a valid identifier, otherwise returns FALSE.
 */
function isValidVariableIdentifier($evalString)
{
    $evalResult = preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $evalString);

    return $evalResult ? true : false;
}
