<?php

include __DIR__ . '/vendor/autoload.php';

use Controllers\AppController;

session_start();
AppController::startApp();
