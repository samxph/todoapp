<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {
    protected $table = 'user';

    protected $allowedFields = ['username','password'];

    public function check ($username,$password) {
        $this->where('username', $username);
        $query = $this->get();
        // print $this->getLastQuery(); // this for debugging
        $row = $query->getRow();
        if ($row) { // check if SQL returned a row
            if (password_verify($password,$row->password)) { // verify passwd
                return $row;
            }
        }
        return null; // Null will be returned, if no user with given username
    }

}

?>