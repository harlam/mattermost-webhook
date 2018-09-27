<?php

namespace harlam\Mattermost;

use harlam\Mattermost\Interfaces\MattermostWebhookInterface;

/**
 * @see https://developers.mattermost.com/integrate/incoming-webhooks/
 * Class MattermostWebhook
 * @package harlam\Mattermost
 */
class MattermostWebhook implements MattermostWebhookInterface
{
    private $_url     = '';
    private $_payload = [];

    /**
     * Set Mattermost Webhook-Url
     * @param string $url
     * @return MattermostWebhookInterface
     */
    public function setUrl(string $url): MattermostWebhookInterface
    {
        $this->_url = $url;
        return $this;
    }

    /**
     * Get Mattermost Webhook-Url
     * @return string
     */
    public function getUrl(): string
    {
        return $this->_url;
    }

    /**
     * Set Mattermost payload
     * @param array $payload
     * @return MattermostWebhookInterface
     */
    public function setPayload(array $payload): MattermostWebhookInterface
    {
        $this->_payload = $payload;
        return $this;
    }

    /**
     * Get Mattermost payload
     * @return array
     */
    public function getPayload(): array
    {
        return $this->_payload;
    }

    /**
     * Send message
     * @return bool
     */
    public function send(): bool
    {
        $data = json_encode($this->_payload);
        $ch   = curl_init($this->_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );

        return curl_exec($ch) === 'ok';
    }
}