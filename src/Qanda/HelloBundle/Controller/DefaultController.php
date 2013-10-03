<?php

namespace Qanda\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;


class DefaultController extends Controller
{
    /**
     * @Route("/{v1}/{v2}", name="_qanda_hello")
     * @Template()
     */
    public function indexAction($v1, $v2=5)
    {
        $str = $v1.$v2;
        return array('text' => $str);
    }
}
