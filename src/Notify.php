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
	 * @param int         $timeout
	 */
	public function info($title, $content, $icon = true, $timeout = 5000)
	{
		$this->message($title, $content, $icon, 'info', $timeout);
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
		$this->message($title, $content, $icon, 'success');
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
		$this->message($title, $content, $icon, 'danger');
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
		$this->message($title, $content, $icon, 'warning');
	}

	/**
	 * Flash a modal
	 *
	 * @param $title
	 * @param $content
	 */
	public function overlay($title, $content)
	{
		$this->session->flash('notify.overlay', true);
		$this->session->flash('notify.title', $title);
		$this->session->flash('notify.content', $content);
	}

	/**
	 * Flash a notification message
	 *
	 * @param             $title
	 * @param             $content
	 * @param bool|string $icon
	 * @param string      $level
	 * @param int         $timeout
	 * @param string      $type
	 */
	public function message($title, $content, $icon, $level = 'info', $timeout = 5000, $type = 'small')
	{
		$this->session->flash('notify.title', $title);
		$this->session->flash('notify.content', $content);
		$this->session->flash('notify.level', $level);
		$this->session->flash('notify.color', notify_color($level));
		$this->session->flash('notify.type', $type);

		// if icon == true, get icon from level, else if icon is string, set icon
		if ((is_bool($icon) && $icon == true) || strlen($icon) > 1)
		{
			$icon = is_string($icon) ? $icon : notify_icon($level);

			$this->session->flash('notify.icon', $icon);
		}

		if ($timeout > 0)
		{
			$this->session->flash('notify.timeout', $timeout);
		}
	}

}
