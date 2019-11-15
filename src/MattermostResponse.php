<?php

namespace harlam\Mattermost;

use harlam\Mattermost\Interfaces\MattermostResponseInterface;

class MattermostResponse implements MattermostResponseInterface
{
    protected $isSuccess;

    public function __construct(bool $isSuccess = true)
    {
        $this->isSuccess = $isSuccess;
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }
}