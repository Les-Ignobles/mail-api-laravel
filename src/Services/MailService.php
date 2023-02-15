<?php
/**
 * Author: Theo Champion
 * Date: 15/02/2023
 * Time: 15:26
 */

namespace LesIgnobles\MailApiLaravel\Services;

use LesIgnobles\MailApiLaravel\Dto\MailTemplateOption;

abstract class MailService
{
    abstract public function sendMailTemplate(MailTemplateOption $options): void;
}
