<?php

/**
 *
 * @see XenForo_ControllerPublic_Member
 */
class ThemeHouse_DailyPostLimit_Extend_XenForo_ControllerPublic_Member extends XFCP_ThemeHouse_DailyPostLimit_Extend_XenForo_ControllerPublic_Member
{

    /**
     *
     * @see XenForo_ControllerPublic_Abstract::assertNotFlooding()
     */
    public function assertNotFlooding($action, $floodingLimit = null)
    {
        parent::assertNotFlooding($action, $floodingLimit);

        if (!ThemeHouse_DailyPostLimit_Model_DailyPostLimit::checkDailyPostLimit($action)) {
            throw $this->responseException(
                $this->responseError(new XenForo_Phrase('th_you_have_reached_daily_limit_for_this_action_dailypostlimit')));
        }
    } /* END assertNotFlooding */
}