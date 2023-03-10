<?php
namespace nspace;
require_once './vendor/autoload.php';


use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validation;
use DateTime;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    public DateTime $creationTime;
    function __construct($id, string $name,string $email, string $password){
        $flag = true;

        $validator = Validation::createValidator();
        $validID = $validator->validate($id, [
            new Positive(), new NotBlank(),
        ]);
        if (count($validID) !== 0)
        {
            $flag = false;
            foreach ($validID as $value)
                echo $value->getMessage(). "error in ID\n";
        }

        $validator = Validation::createValidator();
        $validName = $validator->validate($name, [
            new NotBlank(), new Length(["min" =>1 , "max"=>50 ]) , new Regex("/^[A-Z]{1}[a-z]{0,}$/"),
        ]);
        if (count($validName) !== 0)
        {
            $flag = false;
            foreach ($validName as $value)
                echo $value->getMessage(). "error in Name\n";
        }

        $validator = Validation::createValidator();
        $validEmail = $validator->validate($email, [
            new NotBlank(), new Length(["min" =>5 , "max"=>100 ]),
        ]);
        if (count($validEmail) !== 0)
        {
            $flag = false;
            foreach ($validEmail as $value)
                echo $value->getMessage(). "error in Email\n";
        }



        if ($flag){
            $this-> id = $id;
            $this-> name = $name;
            $this-> email = $email;
            $this-> password = $password;
        }
        $this->creationTime = new DateTime('now');
    }
    public function getCreationTime(): DateTime
    {
        return $this->creationTime;
    }
}