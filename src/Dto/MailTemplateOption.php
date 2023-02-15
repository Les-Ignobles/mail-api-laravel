<?php
/**
 * Author: Theo Champion
 * Date: 15/02/2023
 * Time: 15:28
 */

namespace LesIgnobles\MailApiLaravel\Dto;

class MailTemplateOption
{
    /**
     * MailTemplateOption constructor.
     *
     * @param string      $from
     * @param MailTo[]    $to
     * @param string|null $templateId
     * @param array       $params
     */
    public function __construct(
        public string $from = '',
        public array $to = [],
        public string|null $templateId = null,
        public array $params = [],
    )
    {
    }
}
