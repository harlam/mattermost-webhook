<?php

namespace harlam\Mattermost\Interfaces;

use harlam\Mattermost\Exception\SendException;

interface MattermostSenderInterface
{
    /**
     * @param MattermostMessageInterface $message
     * @return MattermostResponseInterface
     * @throws SendException
     */
    public function send(MattermostMessageInterface $message): MattermostResponseInterface;
}