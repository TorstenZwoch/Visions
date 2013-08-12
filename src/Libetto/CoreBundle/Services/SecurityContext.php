<?php
namespace Libetto\CoreBundle\Services;

//use Symfony\Component\DependencyInjection\ContainerInterface;

class SecurityContext
{
//    protected $container;
//
//    public function __construct(ContainerInterface $container)
//    {
//        $this->container = $container;
//    }
//
//    public function getUser()
//    {
//        //return $this->container->get('security.context')->getToken()->getUser();
//    }
    
    public function __construct()
    {
       
    }
    public function getUser()
    {
        return "test";
    }
}