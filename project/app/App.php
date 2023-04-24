<?php

declare(strict_types=1);

function getTransactionData(): array
{
  $totalIncome = [];
  $totalexpense = [];

  if (!file_exists('../transaction_files/sample_1.csv')) {
    echo "File not found";
    exit;
  }
  $handler = fopen('../transaction_files/sample_1.csv', 'r');
  $transactionData = [];
  $transaction = [];
  while ($line = fgetcsv($handler)) {
    if ($line[0] !== 'Date') {
      $line[0] = date('M d, Y', strtotime($line[0]));
      $amount = (float)str_replace(',', '', (str_replace('$', '', $line[3])));
      if ($amount < 0) {
        $totalexpense[] = $amount;
        $line[4] = 'red';
      } else {
        $totalIncome[] = $amount;
        $line[4] = 'green';
      }
    $transactionData[]= [
      'date' => $line[0],
      'check' => $line[1],
      'desc' => $line[2],
      'amount' => $line[3],
      'color' => $line[4]];
    }
  }
  return [$transactionData, array_sum($totalIncome), array_sum($totalexpense)];
}

getTransactionData();
