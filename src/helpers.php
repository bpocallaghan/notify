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
                return 'fas fa-times shake';
                break;
            case 'warning':
                return 'fas fa-warning shake';
                break;
            case 'success':
                return 'far fa-smile bounce';
                break;
            default: // info / default
                return 'fas fa-bell shake';
                break;
        }
    }
}

if (!function_exists('notify_icon_small')) {
    /**
     * Get the icon for the notify level
     *
     * @param $level
     * @return string
     */
    function notify_icon_small($level)
    {
        switch ($level) {
            case 'danger':
                return 'fas fa-times spin';
                break;
            case 'warning':
                return 'fas fa-times-circle spin';
                break;
            case 'success':
                return 'far fa-smile bounce';
                break;
            default: // info / default
                return 'fas fa-bell spin';
                break;
        }
    }
}
