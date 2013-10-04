<?php

namespace Qanda\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

use Qanda\HelloBundle\Entity\Product;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="product_list")
     * @Template()
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()
            ->getRepository('QandaHelloBundle:Product')
            ->findAll();

        return array('products' => $products);
    }

    /**
     * @Route("/add", name="product_add")
     * @Template()
     */
    public function addAction()
    {
        $product = new Product();
        $product->setName('New Product name');
        $product->setPrice('20.99');
        $product->setDescription('Lorem ipsum dolor sit amet');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return array();
    }

    /**
     * @Route("/show/{id}", name="product_show")
     * @Template()
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('QandaHelloBundle:Product')
            ->find($id);

        if (!$product){
            throw $this->createNotFoundException("Product $id is not found!");
        }

        return array('product' => $product);
    }

    /**
     * @Route("/delete/{id}", name="product_delete")
     */
    public function deleteAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('QandaHelloBundle:Product')
            ->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();

        return $this->redirect($this->generateUrl('product_list'));
    }
}
