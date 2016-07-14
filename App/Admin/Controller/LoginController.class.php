<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

    public function index(){

        if (IS_POST) {
            $username = I('post.username', '', 'trim');
            $password = I('post.password', '', 'trim');
            $captcha  = I('post.captcha', '', 'trim');
            if (!$username && !$password) {
                return show(300, '用户名或密码不能为空!');
            }

            //验证码检验
            if (!check_verify($captcha)) {
                return show(300, '验证码错误!');
            }
            $map = array(
                    'username' => $username,
                    'password' => getMd5($password),
                    'status'   => 1
                );
            
            $result = M('manager')->where($map)->find();
            
            if (!$result) {
                return show(300, '用户名或密码错误!');
            } else {
                session('mid', $result['id']);
                session('userInfo', $result);
                return show(200, '登录成功', false, array('url'=>U('Index/index')));
            }
            
        } else {
            //如果已登录，跳转到主页
            if (is_login()) {
                $this->redirect('Index/index');
            } else {
                $this->display();
            }
        }
        
    }

    public function loginOut(){
        session(null);
        if (is_login()) {
            $this->error('退出失败', U('Index/index'));
        } else {
            $this->redirect('Login/index');
        }
    }

    public function verify(){
        $config =    array(
            //'fontSize'    =>    30,    // 验证码字体大小    
            'length'      =>    4,     // 验证码位数    
            'useNoise'    =>    false, // 关闭验证码杂点
        );
            
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
}