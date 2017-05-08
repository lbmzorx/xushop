<?php

namespace app\modules\admin\controllers;

use app\controllers\BaseController;

/**
 * Default controller for the `admin` module
 */
class CommonController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = 'main';
    public function init(){
        parent::init();
    }


}
