<?php

/**
 * 
 */
class MessageModel
{
    private $msg;
    private $isError;
    function __construct($isError, $msg)
    {
        $this->isError = $isError;
        $this->msg = $msg;
    }

    public function getMsg()
    {
        return $this->msg;
    }
    public function isError()
    {
        return $this->isError;
    }
    // public function setMsg($msg='')
    // {
    //     $this->msg = $msg;
    // }


}

?>