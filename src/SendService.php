<?php

namespace harlam\Mattermost;

/**
 * @see https://developers.mattermost.com/integrate/incoming-webhooks/
 * @package harlam\Mattermost
 */
class SendService implements SendServiceInterface
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Send message
     * @param array $message
     * @return bool
     */
    public function send(array $message): bool
    {
        $data = json_encode($message);
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ]);

        return curl_exec($curl) === 'ok';
    }
}