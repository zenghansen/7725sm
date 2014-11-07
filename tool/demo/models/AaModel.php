<?php

class AsModel
{
    public $bm_AccountID = "";
    public $bm_Password = "";
    public $bm_AccountName = "";
    public $bm_AccountType = 0;
    public $bm_AccountIPRight = 0;
    public $bm_AccountState = 0;
    public $bm_DtptID = 0;
    public $bm_RankID = 0;
    public $bm_ARemark = "";

    public function __construct($_bm_AccountID = "", $_bm_Password = "", $_bm_AccountName = "",
                                $_bm_AccountType = 0, $_bm_AccountIPRight = 0, $_bm_AccountState = 0, $_bm_DtptID = 0,
                                $_bm_RankID = 0, $_bm_ARemark = "")
    {
        $this->bm_AccountID = $_bm_AccountID;
        $this->bm_Password = $_bm_Password;
        $this->bm_AccountName = $_bm_AccountName;
        $this->bm_AccountType = $_bm_AccountType;

        $this->bm_AccountIPRigh = $_bm_AccountIPRight;
        $this->bm_AccountState = $_bm_AccountState;
        $this->bm_DtptID = $_bm_DtptID;

        $this->bm_RankID = $_bm_RankID;
        $this->bm_ARemark = $_bm_ARemark;

    }

    public function __destruct()
    {
    }

}
