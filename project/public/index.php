<?php

declare(strict_types = 1);

include '../app/App.php';

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

[$transactions, $totalIncome, $totalExpense] = getTransactionData();

$netTotal = $totalIncome + $totalExpense;

include '../views/transactions.php';