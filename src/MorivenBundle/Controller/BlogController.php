<?php

namespace MorivenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * @Route("/blog-post")
     */
    public function indexAction()
    {
        return $this->render('@moriven/views/blog-single.html.twig');
    }
}
