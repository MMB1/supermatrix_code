<?php
namespace DBConnectionInterface;

/**
 * Impliment user methods add and get by id
 * In a case in the future, we need to store these details in text or redis then we will create an export button in front and easily export whole records 
 */

class MySqlUserStore implements UserStore
{
    public $db;

    public function __construct(DBConnectionInterface $db)
    {
        $this->db = $db;

    }

    // User can add their inforamtion 
    public function Create( User $user) : User
    {
        $query = "INSERT INTO users (name) VALUES (?)";
        $user->id = $this->db->insert($query, array($user->name));
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
            $user->name = $result[0]['name'];
            return $user;
        }
        return null;

    }
} 
?>