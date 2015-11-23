<?php

class ThemeHouse_DailyPostLimit_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{
    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_DailyPostLimit' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Account',
                    'XenForo_ControllerPublic_Conversation',
                    'XenForo_ControllerPublic_Forum',
                    'XenForo_ControllerPublic_Member',
                    'XenForo_ControllerPublic_Misc',
                    'XenForo_ControllerPublic_Post',
                    'XenForo_ControllerPublic_ProfilePost',
                    'XenForo_ControllerPublic_Thread',
                ), /* END 'controller' */
            ), /* END 'ThemeHouse_DailyPostLimit' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_DailyPostLimit_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */
}