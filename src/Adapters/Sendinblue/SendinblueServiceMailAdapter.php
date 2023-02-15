<?php

use GuzzleHttp\Client;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use SendinBlue\Client\Model\SendSmtpEmailTo;

/**
 * Author: Theo Champion
 * Date: 15/02/2023
 * Time: 15:38
 */
class SendinblueServiceMailAdapter extends MailService
{
    /**
     * @throws Exception
     */
    public function sendMailTemplate(MailTemplateOption $options): void
    {
        $sendSmtpEmail = new SendSmtpEmail();
        $to = array_map(function (MailTo $to) {
            return new SendSmtpEmailTo([
                'email' => $to->email,
                'name'  => $to->name
            ]);
        }, $options->to);
        $sendSmtpEmail->setTo($to);
        $sendSmtpEmail->setTemplateId($options->templateId);
        $sendSmtpEmail->setParams((object)$options->params);

        $apiInstance = $this->getTransactionalApiInstance();
        $apiInstance->sendTransacEmail($sendSmtpEmail);
    }

    /**
     * @throws Exception
     */
    private function getApiKey()
    {
        $apiKey = config(Constants::CONFIG_FILENAME . '.providers.sendinblue.api_key');
        if (is_null($apiKey)) {
            throw new Exception('SENDINBLUE_API_KEY not set.');
        }
        return $apiKey;
    }

    /**
     * @throws Exception
     */
    private function getTransactionalApiInstance(): TransactionalEmailsApi
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $this->getApiKey());
        return new TransactionalEmailsApi(new Client(), $config);
    }


}
