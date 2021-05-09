<?php
if (!defined('BASEPATH')) exit('No direct script access allowed!');

class Users extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function login($login, $password, $email)
    {
        $sql = "select * from users where login ='" . $login . "' and password=SHA1('" . $password . "') and email='" . $email . "'";
        echo $sql;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Veloptic
    //Veloptic1234

    public function auth($user)
    {
        $pwd = sha1($user['password']);
        $mail = $user['email'];
        $result = $this->db->get("Users")->result();
        $tempmail = null;
        $temppwd = null;
        $val = -1;
        try {
            foreach ($result as $r) {
                $tempmail = $r->email;
                $temppwd = $r->pwd;
                if (strcmp($mail, $tempmail) == 0) {
                    if (strcmp($pwd, $temppwd) == 0) {
                        $val = 1;
                        if ($r->profile < 10) {
                            throw new Exception("Access refuser");
                        }
                        break;
                    } else {
                        throw new Exception("Password incorrect");
                    }
                }
            }
            if ($val == -1) {
                throw new Exception("User not found");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
