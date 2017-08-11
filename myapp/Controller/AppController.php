<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session','UserAuth',
    );

    public $allow = array('login');

    public function beforeRender() {
        $session = $this->Session->read();
        $this->set('user', @$session['user']['User']);
        if (@$_SERVER['HTTPS'] || @getenv('HTTPS')) {
            $this->request->addDetector('ssl', array(
                'env' => 'HTTP_X_FORWARDED_SSL',
                'value' => 'https'
            ));
        }
        $user = $this->UserAuth->getUser();
        if (@$this->request->params['prefix'] == "admin" && $user['User']['role'] != "admin") {
            $this->warning("没有权限进入!!");
            $this->redirect($this->referer());
        }
    }
    public function succ( $message ) {
        $this->Session->setFlash( $message, 'default', array( 'class' => 'alert alert-success' ) );
    }
    public function error( $message ) {
        $this->Session->setFlash( $message, 'default', array( 'class' => 'alert alert-error' ) );
    }
    public function warning( $message ) {
        $this->Session->setFlash( $message, 'default', array( 'class' => 'alert alert-warning' ) );
    }
    /**
     * @param array   $user
     */
    public function isAuthorized( $user = null ) {
        if ( !is_array( $this->allow ) || in_array( $this->action, $this->allow ) ) {
            return;
        }
        $prefix = $this->params['prefix'];
        if ( !isset( $user['User']['id'] ) ) { // 没有登录
            $this->Session->write( UserAuthComponent::originAfterLogin, $this->request->here );
            $url = array( 'controller' => 'users', 'action' => 'login' );
            if ( $prefix ) {
                $url[$prefix] = false;
            }
            $this->redirect( $url );
        }
    }
}
