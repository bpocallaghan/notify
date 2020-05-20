<?php

if (!function_exists('notify')) {
    /**
     * Helper notify info() without facade: Notify::info()
     *
     * @param null        $title
     * @param null        $content
     * @param bool|string $icon
     * @return \Illuminate\Foundation\Application|mixed
     */
    function notify($title = null, $content = null, $icon = true)
    {
        $notifier = app('notify');

        if (!is_null($title)) {
            return $notifier->info($title, $content, $icon);
        }

        return $notifier;
    }
}

if (!function_exists('notify_icon')) {
    /**
     * Get the icon for the notify level
     *
     * @param $level
     * @return string
     */
    function notify_icon($level)
    {
        switch ($level) {
            case 'danger':
                return 'fas fa-fw fa-times shake';
                break;
            case 'warning':
                return 'fas fa-fw fa-warning shake';
                break;
            case 'success':
                return 'far fa-fw fa-smile bounce';
                break;
            default: // info / default
                return 'fas fa-fw fa-bell shake';
                break;
        }
    }
}
