<?php
class UsersController extends AppController {

    public $layout = "admin";
    public $allow = array('register','login');
    public $prefixLayout = true;
    public $uses = array('User');

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function register($action='/Users/home') {
        $this->layout = 'default';
        $this->site_title = '快速注册 ';

        if ( $this->UserAuth->isLogged() ) {
            $uri = $this->Session->read( UserAuthComponent::originAfterLogin );
            $this->Session->delete( UserAuthComponent::originAfterLogin );
            if ( $uri )
                $this->redirect( $uri );
            else
                $this->redirect($action);
        }

        if ( $this->request->isPost() ) {
            $postData = $this->data;
            $postData['User']['role'] = 'user';
            $postData['User']['created'] = time();
            $postData['User']['last_login'] = time();

            if ( @$postData['User']['password'] !== @$postData['User']['cpassword'] ) {
                $this->User->validationErrors = array(
                    'cpassword' => array( '两次输入密码不一致' )
                );
                return;
            }
            $this->User->create( $postData );
            $user = $this->User->save( $postData );
            if ($user) {
                $this->succ("注册成功!");
                $this->UserAuth->flashUser( $user['User']['id'] );
                if ( $uri )
                    $this->redirect( $uri );
                else
                    $this->redirect( $action );
            }
        }
    }

    public  function login() {
        $this->layout = null;
        if ( $this->request->isPost() ) {
          return $this->error("登录失败!");
        }
    }

    public function logout() {
        $this->UserAuth->logout();
        $this->redirect( array( 'action' => 'login' ) );
    }

    public function home()
    {
        $this->layout = "default";
        if($this->request->isPost()){
            $data  = $this->request->data;
        }
    }

    public function password()
    {
        $this->layout = "default";
        $active_arr = $this->User->active_arr;
        $this->set(compact('active_arr'));
        $id = $this->UserAuth->getUserId();

        $me = $this->UserAuth->getUser();
        $role_arr = $this->User->role_arr;
        $this->set('role_arr',$role_arr);
        if ($this->request->isPost() || $this->request->isPut()){
            $post_data = $this->request->data;

            $data = $this->request->data;
            if ($data['User']['password'] !== $data['User']['cpassword']) {
                $this->User->validationErrors = array(
                    'cpassword' => array("两次输入密码不一致")
                );
                return;
            }
            if (strlen($data['User']['password']) < 6) {
                $this->User->validationErrors = array(
                    'password' => array("密码最少6位数")
                );
                return;
            }
            if ($data['User']['opassword'] !== $me['User']['password']) {
                $this->User->validationErrors = array(
                    'opassword' => array("密码错误")
                );
                return;
            }
            $this->User->id = $id;
            if ($this->User->save($post_data)) {
                 $this->succ('修改成功!');
                 $this->redirect(array('controller'=>'Users','action'=>'login','admin'=>false));
            }else{
                $this->error('修改失败'.print_r($this->User->validationErrors,true));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    public function admin_password()
    {
        $active_arr = $this->User->active_arr;
        $this->set(compact('active_arr'));
        $id = $this->UserAuth->getUserId();

        $me = $this->UserAuth->getUser();
        $role_arr = $this->User->role_arr;
        $this->set('role_arr',$role_arr);
        if ($this->request->isPost() || $this->request->isPut()){
            $post_data = $this->request->data;

            $data = $this->request->data;
            if ($data['User']['password'] !== $data['User']['cpassword']) {
                $this->User->validationErrors = array(
                    'cpassword' => array("两次输入密码不一致")
                );
                return;
            }
            if (strlen($data['User']['password']) < 6) {
                $this->User->validationErrors = array(
                    'password' => array("密码最少6位数")
                );
                return;
            }
            if ($data['User']['opassword'] !== $me['User']['password']) {
                $this->User->validationErrors = array(
                    'opassword' => array("密码错误")
                );
                return;
            }
            $this->User->id = $id;
            if ($this->User->save($post_data)) {
                 $this->succ('修改成功!');
                 $this->redirect(array('controller'=>'Users','action'=>'login','admin'=>false));
            }else{
                $this->error('修改失败'.print_r($this->User->validationErrors,true));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    public function admin_index() {
        $this->layout = "admin";
        $this->User->recursive = 0;
        $this->paginate = array(
            'order'=>'User.id desc'
        );
        $this->set('data', $this->paginate());
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->succ("添加成功");
                $this->redirect(array('action'=>'index'));
            }else{
                return ;
            }
        }

    }

    public function admin_edit($id = null) {
       $active_arr = $this->User->active_arr;
        $this->set(compact('active_arr'));
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('无效用户!'));
        }

        $role_arr = $this->User->role_arr;
        $this->set('role_arr',$role_arr);
        if ($this->request->isPost() || $this->request->isPut()){
            $post_data = $this->request->data;
            if ($this->User->save($post_data)) {
                 $this->succ('修改成功!');
                 $this->redirect($this->referer());
            }else{
                $this->error('修改失败'.print_r($this->User->validationErrors,true));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->succ('删除成功');
        } else {
            $this->error('删除失败');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
