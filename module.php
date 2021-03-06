<?php
/**
 *
 *
 * @author Haoleiqin
 * @url
 */
defined('IN_IA') or exit('Access Denied');

class Init
{
    private function session()
    {
        @session_start();
        $_SESSION['mininote_wechat'] = [
            'wxapp' => [
                'wxapp_id' => $this->wechat_app['uniacid'],
            ],
            'we7_data' => [
                'wxapp_id' => $this->wechat_app['uniacid'],
                'app_name' => $this->wechat_app['name'],
                'app_id' => $this->wechat_app['key'],
                'app_secret' => $this->wechat_app['secret'], 
            ],
            'is_login' => true,
        ];

        global $_W;
        $backEndUrl = "{$_W['siteroot']}addons/{$_W['current_module']['name']}/web/backEnd/public/index.php";
        $frontEndUrl = "{$_W['siteroot']}addons/{$_W['current_module']['name']}/web/frontEnd/";

        
        $frontEndUrlWx = "{$_W['siteroot']}addons/{$_W['current_module']['name']}/web/wx/";
        $frontEndUrlWxAccount = "{$_W['siteroot']}addons/{$_W['current_module']['name']}/web/wxaccount/";

        if ($_W['account']['type'] == 4) {
            header('Location:' . $frontEndUrlWx);
            exit;
        }else if($_W['account']['type'] == 1){
            header('Location:' . $frontEndUrlWx);
            exit;
        } else {
            header('Location:' . $frontEndUrl);
            exit;
        }

    }

    public function execute()
    {
        $this->session();
    }
}

(new Init)->execute();
