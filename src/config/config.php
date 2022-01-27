<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Constantes gerais
define('DAILY_TIME', 60 * 60 * 8);
define('ONE_HOUR_SECONDS', 60 * 60);
define('HALF_HOUR_SECONDS', 60 * 30);

// Pastas do projeto
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models/'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views/'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers/'));
define('UTILS_PATH', realpath(dirname(__FILE__) . '/../utils/'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions/'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/templates/'));

// Arquivos
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(MODEL_PATH . '/Model.php');
require_once(MODEL_PATH . '/User.php');
require_once(EXCEPTION_PATH . '/AppException.php');
require_once(EXCEPTION_PATH . '/ValidationException.php');
