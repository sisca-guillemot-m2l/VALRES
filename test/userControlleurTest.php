<?php


use PHPUnit\Framework\TestCase;
//use UserControlleurUnit\userControlleur;

class userControlleurTest extends TestCase
{
    public function testMultiplication(){
        $this->assertEquals(4, 2*2);
    }

    public function loginTest (){
        $bdd = new bddControlleur();

    }

}

