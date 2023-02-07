  <?php

include 'DBConnectionInterface.php';

class user {
  private $id;
  private $first_name;
  private $last_name;
  private $email;
  private $mobile_number;

  function __construct($id) {
    $this->first_name = "";
    $this->last_name = "";
    $this->email = "";
    $this->mobile_number = "";
  }

}

  ?>