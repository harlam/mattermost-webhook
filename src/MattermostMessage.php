<?php

namespace harlam\Mattermost;

use harlam\Mattermost\Interfaces\MattermostMessageInterface;

class MattermostMessage implements MattermostMessageInterface
{
    protected $message;

    public function __construct(array $message)
    {
        $this->message = $message;
    }

    /**
     * Markdown-formatted message to display in the post.
     * To trigger notifications, use @<username>, @channel and @here like you would in normal Mattermost messaging.
     * @return string
     */
    public function getText(): string
    {
        return $this->message['text'];
    }

    /**
     * Overrides the channel the message posts in. Use the channel’s name and not the display name, e.g. use town-square, not Town Square.
     * Use an “@” followed by a username to send to a direct message.
     * Defaults to the channel set during webhook creation.
     * The webhook can post to any public channel and private channel the webhook creator is in.
     * Posts to direct messages will appear in the DM between the targeted user and the webhook creator.
     * @return string
     */
    public function getChannel(): string
    {
        return $this->message['channel'];
    }

    /**
     * Overrides the username the message posts as.
     * Defaults to the username set during webhook creation or the webhook creator’s username if the former was not set.
     * Must be enabled in the configuration.
     * @return string
     */
    public function getUsername(): string
    {
        return $this->message['username'];
    }

    /**
     * Overrides the profile picture the message posts with.
     * Defaults to the URL set during webhook creation or the webhook creator’s profile picture if the former was not set.
     * Must be enabled in the configuration.
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->message['icon_url'];
    }

    /**
     * Overrides the profile picture and icon_url parameter. Defaults to none and is not set during webhook creation.
     * Must be enabled in the configuration. The expected content is an emoji name, as typed in a message but without :.
     * @return string
     */
    public function getIconEmoji(): string
    {
        return $this->message['icon_emoji'];
    }

    /**
     * Message attachments used for richer formatting options.
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->message['attachments'];
    }

    /**
     * Sets the post type, mainly for use by plugins.
     * If not blank, must begin with “custom_”.
     * @return string
     */
    public function getType(): string
    {
        return $this->message['type'];
    }

    /**
     * Sets the post props, a JSON property bag for storing extra or meta data on the post.
     * Mainly used by other integrations accessing posts through the REST API.
     * The following keys are reserved: “from_webhook”, “override_username”, “override_icon_url”, “override_icon_emoji”,
     * “webhook_display_name”, “card” and “attachments”. Props card allows for extra information (markdown formatted text)
     * to be sent to Mattermost that will only be displayed in the RHS panel after a user clicks on an ‘info’ icon
     * displayed alongside the post. The info icon cannot be customized and is only rendered visible to the user if there
     * is card data passed into the message. This is only available in v5.14+. There is currently no Mobile support for card functionality.
     * @return array
     */
    public function getProps(): array
    {
        return $this->message['props'];
    }
}