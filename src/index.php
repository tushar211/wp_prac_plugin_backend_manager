<?php
namespace BackendManager; 
use BackendManager\includes\Transaction;
use Ramsey\Uuid\UuidFactory;


class Index
{
  public function __construct()
  { 
    $id = new UuidFactory(); 
    echo $id->uuid4(); 
    var_dump(new Transaction());    
  }
}
