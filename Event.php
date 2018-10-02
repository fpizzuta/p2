<?php
namespace Frank;

class Event
{
    private $request;
    public $firstName;
    public $lastName;
    public $trackName;
    public $guests = 0;
    public $diet = false;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function cost($guests)
    {
        return 1500 + $guests * 100;
    }

}