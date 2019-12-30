<?php

namespace harlam\Mattermost;

/**
 * @see https://developers.mattermost.com/integrate/incoming-webhooks/
 * @package harlam\Mattermost\Interfaces
 */
interface SendServiceInterface
{
    /**
     * Send message
     * @param array $message
     */
    public function send(array $message): void;
}