<?php


class userControlleur
{
    private $statut;

    public function login()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $bdd = new bddControlleur();
        $bdd->_connect();
        $value = $bdd->queryDisplay('SELECT password FROM user WHERE username=:username', array ('username'=>$username));
        $checkPassword = $value['password'];

        if  (password_verify ( $password , $checkPassword))
        {
            $value = $bdd->queryDisplay('SELECT id,statut,username FROM user WHERE username=:username', array('username'=>$username));
            $_SESSION['id'] = $value['id'];
            $_SESSION['statut'] = $value['statut'];
            $_SESSION['name'] = $value['username'];
            //echo $value['id'];
            //echo $value['statut'];
            header ('refresh:0;url=?page=userpage');
        }
        else
        {
            echo "mot de passe erroné";
            header ('refresh:0;url=?page=login');
        }
    }

    public function register ()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $hashed = password_hash($password,PASSWORD_BCRYPT);

        $bdd = new bddControlleur();
        $bdd->_connect();
        $check = $bdd->queryDisplay('SELECT username FROM user WHERE username=:username', array(':username'=>$username));

        if ($check['username'] != $username) {
            $bdd->queryDisplay('INSERT INTO user (username, password, email, statut) VALUES (:username,:hashed,:email,"user")', array(':username'=>$username, ':hashed'=>$hashed, ':email'=>$email));
        }
        header ('refresh:0;url=?page=accueil');
    }

    public function getStatutById ($id)
    {
        $bdd = new bddControlleur();
        $bdd->_connect();
        $this->statut = $bdd->queryDisplay('SELECT statut FROM user WHERE id="'.$id.'"');
        return $this->statut;
    }

    public function logout () {
        $_SESSION['id']=null;
        session_destroy();
        header ('refresh:0;url=?page=accueil');
    }

    function send_sms($num, $texte, $emetteur, $ref) {
        $url = 'https://api.smsmode.com/http/1.6/sendSMS.do';
        $texte = iconv("UTF-8", "ISO-8859-15", $texte);
        $fields_string = 'accessToken=GHpM3IVW5Pi0L4WkkuwazEcetF3B53ac&message='.urlencode($texte).'&numero='.$num.'&emetteur='.$emetteur.'&refClient='.$ref.'&stop=1';

        echo $fields_string;

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        $result = curl_exec($ch);

        curl_close($ch);
        var_dump($result);

        return $result;
    }

    public function sendMessage () {
        //$this->send_sms("#mon numero de tel","Ceci est un test", "#mon numero de tel", "ref123");
        header ('refresh:0;url=?page=userPage');
    }
}