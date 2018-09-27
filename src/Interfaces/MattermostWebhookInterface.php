<?php

namespace harlam\Mattermost\Interfaces;

/**
 * @see https://developers.mattermost.com/integrate/incoming-webhooks/
 * Interface MattermostWebhookInterface
 * @package harlam\Mattermost\Interfaces
 */
interface MattermostWebhookInterface
{
    /**
     * Set Mattermost Webhook-Url
     * @param string $url
     * @return MattermostWebhookInterface
     */
    public function setUrl(string $url): MattermostWebhookInterface;

    /**
     * Get Mattermost Webhook-Url
     * @return string
     */
    public function getUrl(): string;

    /**
     * Set Mattermost payload
     * @param array $payload
     * @return MattermostWebhookInterface
     */
    public function setPayload(array $payload): MattermostWebhookInterface;

    /**
     * Get Mattermost payload
     * @return array
     */
    public function getPayload(): array;

    /**
     * Send message
     * @return bool
     */
    public function send(): bool;
}