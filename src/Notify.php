<?php
namespace Bpocallaghan\Notify;

use Illuminate\Session\Store;

class Notify
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an info notification
     *
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function info($title, $content, $icon = true)
    {
        $this->message('info', $title, $content, $icon);
    }

    /**
     * Flash a success notification
     *
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function success($title, $content, $icon = true)
    {
        $this->message('success', $title, $content, $icon);
    }

    /**
     * Flash an error notification
     *
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function error($title, $content, $icon = true)
    {
        $this->message('danger', $title, $content, $icon);
    }

    /**
     * Flash an danger notification
     *
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function danger($title, $content, $icon = true)
    {
        $this->message('danger', $title, $content, $icon);
    }

    /**
     * Flash a warning notification
     *
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function warning($title, $content, $icon = true)
    {
        $this->message('warning', $title, $content, $icon);
    }

    /**
     * Flash a notification message
     *
     * @param string      $level
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     * @param int         $timeout
     */
    public function message($level, $title, $content, $icon, $timeout = 5000) {
        $this->session->flash('notify.level', $level);
        $this->session->flash('notify.title', $title);
        $this->session->flash('notify.content', $content);

        // if icon == true, get icon from level, else if icon is string, set icon
        if ((is_bool($icon) && $icon == true) || strlen($icon) > 1) {
            $icon = is_string($icon) ? $icon : notify_icon($level);

            $this->session->flash('notify.icon', $icon . ' animated');
        }

        if ($timeout > 0) {
            $this->session->flash('notify.timeout', $timeout);
        }
    }
}
