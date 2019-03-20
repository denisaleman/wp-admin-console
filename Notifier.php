<?php
namespace Gafotas\Utility;

class Notifier
{
    private static $messages = [];

    private static $init = false;

    public static function output()
    {
        echo '<div class="notice">';
        foreach (self::$messages as $key => $message) {
            if (is_array($message) || is_object($message)) {
                echo '<pre>' . print_r($message, true) . '</pre>';
            } else if (is_null($message)) {
                echo "<p>null</p>";
            } else {
                echo "<p>$message</p>";
            }
        }
        echo '</div>';
    }

    public static function maybe_init()
    {
        if (!self::$init) {
            add_action('admin_notices', [get_class(), 'output']);
            self::$init = true;
        }
    }

    public static function push($message = null)
    {
        self::maybe_init();
        self::$messages[] = $message;
    }
}
