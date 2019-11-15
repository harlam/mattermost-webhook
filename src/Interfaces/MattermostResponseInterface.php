<?php

namespace harlam\Mattermost\Interfaces;

/**
 * Interface MattermostResponseInterface
 * @package harlam\Mattermost\Interfaces
 */
interface MattermostResponseInterface
{
    public function isSuccess(): bool;
}