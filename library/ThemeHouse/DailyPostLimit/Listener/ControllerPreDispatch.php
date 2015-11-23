<?php

class ThemeHouse_DailyPostLimit_Listener_ControllerPreDispatch extends ThemeHouse_Listener_ControllerPreDispatch
{

    public function run()
    {
        if (self::$_controller instanceof XenForo_ControllerPublic_Misc) {
            self::$_showCopyright = true;
        }

        parent::run();
    } /* END run */

    public static function controllerPreDispatch(XenForo_Controller $controller, $action)
    {
        $controllerPreDispatch = new ThemeHouse_DailyPostLimit_Listener_ControllerPreDispatch($controller, $action);
        $controllerPreDispatch->run();
    } /* END controllerPreDispatch */
}