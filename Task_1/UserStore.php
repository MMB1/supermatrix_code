  <?php

include 'DBConnectionInterface.php';
include 'user.php';
/**
 * As per instruction implement comman add and get user methods
 */
  interface UserStore 
  {
      public function Create(User $user) : User;
      public function getByUserId(string $id) : ?User;
  } 

  ?>