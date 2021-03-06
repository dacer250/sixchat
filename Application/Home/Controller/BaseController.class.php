<?php
/**
 * Created by PhpStorm.
 * User: StrickYan
 * Date: 2017/8/17
 * Time: 16:59
 */

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    protected $obj;
    protected $momentModel;
    protected $userModel;
    protected $commentModel;
    protected $friendRequestModel;
    protected $friendModel;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->obj = new SixChatApi2016Controller();
        $this->momentModel = D('Moment');
        $this->userModel = D('User');
        $this->commentModel = D('Comment');
        $this->friendRequestModel = D("FriendRequest");
        $this->friendModel = D("Friend");
    }

    /**
     * 登录状态验证
     */
    public function _initialize()
    {
        // 判断用户是否已经登录
        if (!isset($_SESSION['name'])) {
            $this->error('', U('/auth/login'), 1);
        }
    }

}