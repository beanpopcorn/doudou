<?php

namespace weapp\Comment\behavior\home;

use think\Db;

class CommentBehavior
{
    protected static $actionName;
    protected static $controllerName;
    protected static $moduleName;
    protected static $method;

    /**
     * 构造方法
     *
     * @param Request $request Request对象
     *
     * @access public
     */
    public function __construct()
    {
        ! isset(self::$moduleName) && self::$moduleName = request()->module();
        ! isset(self::$controllerName) && self::$controllerName = request()->controller();
        ! isset(self::$actionName) && self::$actionName = request()->action();
        ! isset(self::$method) && self::$method = strtoupper(request()->method());
    }

    /**
     * 模块初始化
     *
     * @param array $params 传入参数
     *
     * @access public
     */
    public function moduleInit(&$params)
    {

    }

    /**
     * 操作开始执行
     *
     * @param array $params 传入参数
     *
     * @access public
     */
    public function actionBegin(&$params)
    {

    }

    /**
     * 视图内容过滤
     *
     * @param array $params 传入参数
     *
     * @access public
     */
    public function viewFilter(&$params)
    {
        $aid = input('param.aid/d', 0);
        if (empty($aid) || !stristr($params, '</head>')) {
            return true;
        }

        /*只有相应的内容详情页的控制器和操作名才执行，以便提高性能*/
        $ctlActArr = array(
            '*@view', // *_content表
            'View@index',// article_content表product_content表images_content表download_content表
            'Buildhtml@*',// 支持生成静态HTML
        );
        $ctlActStr = self::$controllerName.'@*';
        $ctlActStr2 = '*@'.self::$actionName;
        $ctlActStr3 = self::$controllerName.'@'.self::$actionName;
        if (in_array($ctlActStr, $ctlActArr) || in_array($ctlActStr2, $ctlActArr) || in_array($ctlActStr3, $ctlActArr)) {

            //判断插件是否启用
            $weappRow = Db::name('weapp')->field('id,data')
                ->where(array(
                    'code'   => 'Comment',
                    'status' => 1,
                ))->find();
            if (!empty($weappRow)) {
                try {
                    $data = unserialize($weappRow['data']);
                    if (0 < $aid && !empty($data['is_jquery'])) {
                        $jqueryStr = 'document.write(unescape("%3Cscript type=\'text/javascript\' src=\''.ROOT_DIR.'/public/static/common/js/jquery.min.js?v='.getVersion().'\'%3E%3C/script%3E"));';
                        $params = str_ireplace("console.log('ey_is_jquery');", $jqueryStr, $params);
                    }
                } catch (\Exception $e) {}
            }
        }
    }

    /**
     * 应用结束
     *
     * @param array $params 传入参数
     *
     * @access public
     */
    public function appEnd(&$params)
    {

    }
}