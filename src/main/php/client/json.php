<?php

require_once dirname(__FILE__) . '/../requires.php';

use \SymfonyWorld\Thrift;

$request = count($_POST) ? $_POST : $_GET;
$client = new Thrift("localhost", 9090);

if ($request['type'] == 'outcomes')
{
  $outcomes = $client->getClient()->getUserOutcomes(2);
  $outcomes = array_slice($outcomes, $request['iDisplayStart'], $request['iDisplayLength']);

  $result = array("aaData" => array());
  foreach ($outcomes as $outcome) {
    $result["aaData"][] = array(
      $outcome->amount,
      $outcome->user,
      $outcome->category,
      $outcome->comment
    );
  }
}
elseif ($request['type'] == 'users')
{
  $result = $client->getClient()->getAllUsers();
}
elseif ($request['type'] == 'incomeCategories')
{
  $result = $client->getClient()->getIncomeCategoryTree();
}
elseif ($request['type'] == 'outcomeCategories')
{
  $result = $client->getClient()->getOutcomeCategoryTree();
}

echo json_encode($result);
