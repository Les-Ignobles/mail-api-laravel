<?php
/**
 * Author: Theo Champion
 * Date: 15/02/2023
 * Time: 15:47
 */


class MailTo
{
    public function __construct(public string $email, public string $name = '')
    {
    }
}
