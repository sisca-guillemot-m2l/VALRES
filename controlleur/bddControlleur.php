<?php

class bddControlleur
{
    private $dbh;
    public function _connect ()
    {
          try {
            $this->dbh =new PDO('mysql:host='.HOSTNAME.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }



    public function queryDisplay ($query, array $values=array())
    {
        try {
            $sth = $this->dbh->prepare($query);
            //var_dump($values);
            $sth->execute($values);
            //var_dump($query);
            //echo $this->dbh->lastInsertId();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            //var_dump($values);
            //var_dump($this->dbh->errorInfo());
            var_dump($sth->debugDumpParams());
            return $result;
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function querySimple ($query)
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function queryArray ($query, array $values=array())
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute($values);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function queryStatement ($query)
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
?>


