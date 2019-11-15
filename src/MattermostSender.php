<?php

namespace harlam\Mattermost;

use harlam\Mattermost\Exception\SendException;
use harlam\Mattermost\Interfaces\MattermostMessageInterface;
use harlam\Mattermost\Interfaces\MattermostResponseInterface;
use harlam\Mattermost\Interfaces\MattermostSenderInterface;

class MattermostSender implements MattermostSenderInterface
{
    protected $webhookUrl;

    public function __construct(string $webhookUrl)
    {
        $this->webhookUrl = $webhookUrl;
    }

    /**
     * @param MattermostMessageInterface $message
     * @return MattermostResponseInterface
     * @throws SendException
     */
    public function send(MattermostMessageInterface $message): MattermostResponseInterface
    {
        $data = json_encode([]);

        $curl = curl_init($this->webhookUrl);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ]
        );

        if (curl_exec($curl) === 'ok') {
            return new MattermostResponse();
        }

        throw new SendException();
    }
}