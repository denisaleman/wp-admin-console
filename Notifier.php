<?php 
namespace Gafotas\Utility;

class Notifier
{
    private static $messages = [];

    public static function output()
    {
        echo '<div class="notice">';
        foreach (self::$messages as $key => $message) {
            if (is_array($message) || is_object($message)) {
                echo '<pre>' . print_r($message, true) . '</pre>';
            } else if (is_null($message)) {
                echo "<p>null</p>";
            } else {
                echo "<pre>$message</pre>";
            }
        }
        echo '</div>';
    }

    public static function init()
    {
        add_action('admin_notices', [get_class(), 'output']);
    }

    public static function push($message = null)
    {
        self::$messages[] = $message;
    }
}
