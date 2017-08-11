<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

    /**
     * 返回 admin LTE的相对链接
     */
    public function adminLTEURL($path,$options = array()){
//        pr(Configure::read('App.cssBaseUrl'));exit;
        return $this->assetUrl($path, $options + array('pathPrefix' => "/bower_components/AdminLTE/"));
    }
}
