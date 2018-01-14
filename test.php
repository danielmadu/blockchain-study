<?php

require_once 'block.php';
require_once 'blockchain.php';

$blockchain = new Blockchain();
$blockchain->addBlock(['amount' => 3]);
$blockchain->addBlock(['amount' => 20]);

echo '<pre>';
print_r($blockchain);
var_dump($blockchain->isValid()); // return true
$blockchain->blocks[1]->data['amount'] = 500; //malicious change
var_dump($blockchain->isValid()); //return false
echo '</pre>';