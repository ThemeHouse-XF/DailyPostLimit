<?php

class ThemeHouse_DailyPostLimit_Model_DailyPostLimit extends XenForo_Model
{

    /**
     * Determine if the given user has to wait to perform a given action because
     * of a daily post limit.
     *
     * @param string $action Name of the action. Users have different limits for
     * each action.
     * @param integer|null $dailyPostLimit Number of times the user can perform
     * this action per day.
     * @param integer|null $userId User doing the action. Guests have no limits.
     * If null, uses visitor.
     *
     * @return boolean True if the daily post limit has not been breached
     */
    public function checkDailyPostLimitInternal($action, $dailyPostLimit = 0, $viewingUser = null)
    {
        $dailyPostLimit = $this->_getDailyPostLimitForAction($action, $viewingUser);

        if ($dailyPostLimit <= 0) {
            return true;
        }

        $time = XenForo_Application::$time;
        $dailyPostLimitTime = strtotime("midnight", XenForo_Application::$time);

        $db = $this->_getDb();

        $updateResult = $db->query(
            '
			UPDATE xf_daily_post_limit
			SET last_post_time = ?, daily_post_count = 1
			WHERE user_id = ?
				AND daily_action = ?
				AND last_post_time < ?
		', array(
                $time,
                $viewingUser['user_id'],
                $action,
                $dailyPostLimitTime
            ));
        if ($updateResult->rowCount()) {
            // last post time was not today -> no limit breach
            return true;
        }

        $insertResult = $db->query(
            '
			INSERT IGNORE INTO xf_daily_post_limit
				(user_id, daily_action, last_post_time, daily_post_count)
			VALUES
				(?, ?, ?, 1)
		', array(
                $viewingUser['user_id'],
                $action,
                $time
            ));
        if ($insertResult->rowCount()) {
            // no daily post limit information stored -> no limit breach
            return true;
        }

        $updateResult = $db->query(
            '
			UPDATE xf_daily_post_limit
			SET last_post_time = ?, daily_post_count = daily_post_count + 1
			WHERE user_id = ?
				AND daily_action = ?
				AND last_post_time <= ?
                AND daily_post_count < ?
		', array(
                $time,
                $viewingUser['user_id'],
                $action,
		        $time,
                $dailyPostLimit
            ));
        if ($updateResult->rowCount()) {
            // limit not yet breached -> no limit breach
            return true;
        }

        return false;
    } /* END checkDailyPostLimitInternal */

    protected function _getDailyPostLimitForAction($action, &$viewingUser = null)
    {
        $this->standardizeViewingUserReference($viewingUser);

        if (!$viewingUser['user_id']) {
            return 0;
        }

        switch ($action) {
            case 'conversation':
                return XenForo_Permission::hasPermission($viewingUser['permissions'], 'conversation', 'dailyLimit');
            case 'post':
                return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'dailyPostLimit');
            case 'contact':
                return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'dailyContactLimit');
            case 'report':
                return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'dailyReportLimit');
        }
    } /* END _getDailyPostLimitForAction */

    /**
     * Determine if the given user has to wait to perform a given action because
     * of a daily post limit.
     *
     * @param string $action Name of the action. Users have different limits for
     * each action.
     * @param integer|null $dailyPostLimit Number of times the user can perform
     * this action per day.
     * @param integer|null $userId User doing the action. Guests have no limits.
     * If null, uses visitor.
     *
     * @return boolean True if the daily post limit has not been breached
     */
    public static function checkDailyPostLimit($action, $dailyPostLimit = 0, $userId = null)
    {
        $model = XenForo_Model::create('ThemeHouse_DailyPostLimit_Model_DailyPostLimit');
        return $model->checkDailyPostLimitInternal($action, $dailyPostLimit, $userId);
    } /* END checkDailyPostLimit */

    /**
     * Prune daily post limit data.
     */
    public function pruneDailyPostLimitData()
    {
        $maxTime = strtotime("midnight", XenForo_Application::$time);

        $db = $this->_getDb();
        $db->delete('xf_daily_post_limit', 'last_post_time < ' . $db->quote($maxTime));
    } /* END pruneDailyPostLimitData */
}