<?php

class ThemeHouse_DailyPostLimit_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Account.php' => 'f7875f505800b14e1077e4df0b1448ac',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Conversation.php' => 'a0397c60ca87240d564840c51d255119',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Forum.php' => '768c32f74306fcebe2202be0cf9008af',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Member.php' => '26b47263a49156790dbae2422604ece7',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Misc.php' => '7653a28b7dcae7b7cbb363ab2b75b333',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Post.php' => '4f00d086fb7493a5c73d41986ef9e476',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/ProfilePost.php' => 'df79e42cf36873dea56e9f9bef82019f',
                'library/ThemeHouse/DailyPostLimit/Extend/XenForo/ControllerPublic/Thread.php' => 'd15c5d16bef591b4c80c69b8453ef9d7',
                'library/ThemeHouse/DailyPostLimit/Install/Controller.php' => '2f3ae66bbc16ef49569af392bdd23fcb',
                'library/ThemeHouse/DailyPostLimit/Listener/ControllerPreDispatch.php' => '10fe594d025b56a310c07f4bd3d5f5e5',
                'library/ThemeHouse/DailyPostLimit/Listener/LoadClass.php' => '38d6284ea1648356e528145b72da1348',
                'library/ThemeHouse/DailyPostLimit/Model/DailyPostLimit.php' => 'abe5c31fadb4083b6a2586e87dd37f2d',
                'library/ThemeHouse/Install.php' => '18f1441e00e3742460174ab197bec0b7',
                'library/ThemeHouse/Install/20151109.php' => '2e3f16d685652ea2fa82ba11b69204f4',
                'library/ThemeHouse/Deferred.php' => 'ebab3e432fe2f42520de0e36f7f45d88',
                'library/ThemeHouse/Deferred/20150106.php' => 'a311d9aa6f9a0412eeba878417ba7ede',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
            ));
    }
}