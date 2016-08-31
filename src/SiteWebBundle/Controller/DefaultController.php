<?php

namespace SiteWebBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template("SiteWebBundle:vue:index.html.twig")
     */
    public function getIndex()
    {}
    
    /**
     * @Route("/quisuisje")
     * @Template("SiteWebBundle:vue:quisuisje.html.twig")
     */
    public function getQuisuisje()
    {}
    
    /**
     * @Route("/projet")
     * @Template("SiteWebBundle:vue:projet.html.twig")
     */
    public function getProjet()
    {}
    
    
    /**
     * @Route("/contact")
     * @Template("SiteWebBundle:vue:contact.html.twig")
     */
    public function getContact()
    {}
}
