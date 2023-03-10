<?php
namespace nspace;
use DateTime;
class Comment
{
    private User $user;
    private string $message;

    public function __construct(User $user, string $message){
        $this-> user = $user;
        $this-> message = $message;
    }

    public function isAfterTime(DateTime $dateTime): bool
    {
        return $this->user->getCreationTime()>$dateTime;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}