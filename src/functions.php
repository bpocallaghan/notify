<?php

if (! function_exists('notify'))
{
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

		if (! is_null($title))
		{
			return $notifier->info($title, $content, $icon);
		}

		return $notifier;
	}
}

if (! function_exists('notify_alert'))
{
	/**
	 * Helper notify_alert info() without facade: NotifyAlert::info()
	 *
	 * @param null        $title
	 * @param null        $content
	 * @param bool|string $icon
	 * @return \Illuminate\Foundation\Application|mixed
	 */
	function notify_alert($title = null, $content = null, $icon = true)
	{
		$notifier = app('notify_alert');

		if (! is_null($title))
		{
			return $notifier->info($title, $content, $icon);
		}

		return $notifier;
	}
}

if (! function_exists('notify_color'))
{
	/**
	 * Get the color for the notify level
	 *
	 * @param $level
	 * @return string
	 */
	function notify_color($level)
	{
		switch ($level)
		{
			case 'danger':
				return '#C46A69';
				break;
			case 'warning':
				return '#C79121';
				break;
			case 'success':
				return '#739E73';
				break;
			default: // info / default
				return '#3276B1';
				break;
		}
	}
}

if (! function_exists('notify_icon'))
{
	/**
	 * Get the icon for the notify level
	 *
	 * @param $level
	 * @return string
	 */
	function notify_icon($level)
	{
		switch ($level)
		{
			case 'danger':
				return 'times';
				break;
			case 'warning':
				return 'warning';
				break;
			case 'success':
				return 'check';
				break;
			default: // info / default
				return 'info';
				break;
		}
	}
}