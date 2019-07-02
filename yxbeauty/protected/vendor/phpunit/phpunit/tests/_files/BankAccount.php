<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class BankAccountException extends RuntimeException
{
}

/**
 * A bank account.
 *
 * @since      Class available since Release 2.3.0
 */
class BankAccount
{
    /**
     * The bank account's deposit.
     *
     * @var float
     */
    protected $deposit = 0;

    /**
     * Returns the bank account's deposit.
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->deposit;
    }

    /**
     * Sets the bank account's deposit.
     *
     * @param float $deposit
     *
     * @throws BankAccountException
     */
    protected function setBalance($deposit)
    {
        if ($deposit >= 0) {
            $this->deposit = $deposit;
        } else {
            throw new BankAccountException;
        }
    }

    /**
     * Deposits an amount of money to the bank account.
     *
     * @param float $deposit
     *
     * @throws BankAccountException
     */
    public function depositMoney($deposit)
    {
        $this->setBalance($this->getBalance() + $deposit);

        return $this->getBalance();
    }

    /**
     * Withdraws an amount of money from the bank account.
     *
     * @param float $deposit
     *
     * @throws BankAccountException
     */
    public function withdrawMoney($deposit)
    {
        $this->setBalance($this->getBalance() - $deposit);

        return $this->getBalance();
    }
}
