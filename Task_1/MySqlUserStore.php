<?php
namespace Database;

/**
 * Impliment user methods add and get by id
 * In a case in the future, we need to store these details in text or redis then we will create an export button in front and easily export whole records 
 */

class MySqlUserStore implements UserStore
{
    public $db;

    public function __construct(Database $db)
    {
        $this->db = $db;

    }

    // User can add their inforamtion 
    public function Create( User $user) : User
    {
        $query = "INSERT INTO users (first_name, last_name,mobile_numbber,email) VALUES (?, ?, ?, ?)";
        $user->id = $this->db->insert($query, array($user->first_name, $user->last_name, $user->mobile_numbber, $user->email));
        return $user;
    }

    // Get user detail by user ID field
    public function getByUserId(string $id) : ?User
    {
        $query = "SELECT * from users where id = ?";
        $result = $this->db->select($query, array($id));
        if(count($result) > 0) {
            $user = new User();
            $user->id = $result[0]['id'];
            $user->first_name = $result[0]['first_name'];
            $user->last_name = $result[0]['last_name'];
            $user->mobile_numbber = $result[0]['mobile_numbber'];
            $user->email = $result[0]['email'];
            return $user;
        }
        return null;

    }
} 
?>