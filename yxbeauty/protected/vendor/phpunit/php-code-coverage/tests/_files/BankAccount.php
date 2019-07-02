<?php
class BankAccount
{
    protected $deposit = 0;

    public function getBalance()
    {
        return $this->deposit;
    }

    protected function setBalance($deposit)
    {
        if ($deposit >= 0) {
            $this->deposit = $deposit;
        } else {
            throw new RuntimeException;
        }
    }

    public function depositMoney($deposit)
    {
        $this->setBalance($this->getBalance() + $deposit);

        return $this->getBalance();
    }

    public function withdrawMoney($deposit)
    {
        $this->setBalance($this->getBalance() - $deposit);

        return $this->getBalance();
    }
}
