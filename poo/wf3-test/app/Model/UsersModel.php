<?php

namespace Model;

/**
 * 
 */
class UsersModel extends \W\Model\Model
{
    
    /* Find By Email
     * --
     * Find user by his email address
     */
    
    public function findByEmail($email)
    {
		$sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':email', $email);
		$sth->execute();
        
		return $sth->fetch();
    }
    
}