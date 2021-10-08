<?php
/**
 * 易优CMS
 * ============================================================================
 * 版权所有 2016-2028 海南赞赞网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.eyoucms.com
 * ----------------------------------------------------------------------------
 * 如果商业用途务必到官方购买正版授权, 以免引起不必要的法律纠纷.
 * ============================================================================
 * Author: 小虎哥 <1105415366@qq.com>
 * Date: 2018-4-3`
 */

namespace weapp\Comment\logic;

use think\Db;

/**
 * 业务逻辑
 */
class CommentLogic
{
    private $admin_lang = 'cn';

    /**
     * 析构函数
     */
    function __construct() 
    {
        $this->admin_lang = get_admin_lang();
    }

    /**
     * 同步会员级别的数据到评论级别表
     */
    public function syn_comment_level()
    {
        // 会员级别
        $usersLevelRow = Db::name('users_level')->field('level_id')->where('lang','eq',$this->admin_lang)->select();
        // 评论级别
        $commentLevelRow = Db::name('weapp_comment_level')->field('users_level_id')->where([
                'users_level_id'    => ['gt', 0],
            ])->getAllWithIndex('users_level_id');

        $add_save = [];
        foreach ($usersLevelRow as $key => $val) {
            if (!isset($commentLevelRow[$val['level_id']])) {
                $add_save[] = [
                    'users_level_id'    => $val['level_id'],
                    'is_comment'        => 1,
                    'is_review'         => 0,
                    'add_time'          => getTime(),
                ];
            } else {
                unset($commentLevelRow[$val['level_id']]);
            }
        }

        // 追加新的评论级别
        !empty($add_save) && Db::name('weapp_comment_level')->insertAll($add_save);
        // 删除多余的评论级别
        if (!empty($commentLevelRow)) {
            $del_ids = array_keys($commentLevelRow);
            Db::name('weapp_comment_level')->where(['users_level_id'=>['IN', $del_ids]])->delete();
        }
    }
}
