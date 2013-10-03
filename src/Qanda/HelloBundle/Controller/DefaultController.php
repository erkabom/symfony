<?php

namespace Qanda\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{param1}", name="_qanda_hello")
     * @Template()
     * @Cache(maxage="86400")
     */
    public function indexAction($param1)
    {
        return array('param1' => $param1);
    }
}
