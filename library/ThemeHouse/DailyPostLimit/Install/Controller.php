<?php

class ThemeHouse_DailyPostLimit_Install_Controller extends ThemeHouse_Install
{
    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/daily-post-limit.1919/';
    
    protected function _getTables()
    {
        return array(
            'xf_daily_post_limit' => array(
                'user_id' => 'int(10) unsigned NOT NULL', /* END 'user_id' */
                'daily_action' => 'varchar(25) NOT NULL', /* END 'daily_action' */
                'last_post_time' => 'int(10) unsigned NOT NULL', /* END 'last_post_time' */
                'daily_post_count' => 'int(10) unsigned NOT NULL DEFAULT 1', /* END 'daily_post_count' */
            ), /* END 'xf_daily_post_limit' */
        );
    } /* END _getTables */

    protected function _getPrimaryKeys()
    {
        return array(
            'xf_daily_post_limit' => array(
                'user_id',
                'daily_action',
            ), /* END 'xf_daily_post_limit' */
        );
    } /* END _getPrimaryKeys */

    protected function _getKeys()
    {
        return array(
            'xf_daily_post_limit' => array(
                'last_post_time' => array('last_post_time'), /* END 'last_post_time' */
                'daily_post_count' => array('daily_post_count'), /* END 'daily_post_count' */
            ), /* END 'xf_daily_post_limit' */
        );
    } /* END _getKeys */
}