<?php
namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createSidebarMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
       #$presentation = $em->getRepository('App:Presentation')->getId();
        $menu->addChild('Profil', ['route' => 'presentation_index'])->setAttribute('class','onglet');
        #$menu['Profil']->addChild('Edition',['route' => 'presentation_edit']);
                                             #'routeParameters' => array('id' => $presentation->getId()) ]);
        #routeParameters' => ['id' => $blog->getId()]
        
        $menu->addChild('Expériences', ['route' => 'experiences_index'])->setAttribute('class','onglet');
        $menu->addChild('Formation', ['route' => 'school_index'])->setAttribute('class','onglet');
        $menu->addChild('Compétences', ['route' => 'skills_index'])->setAttribute('class','onglet');
        $menu->addChild('Projets', ['route' => 'projects_index'])->setAttribute('class','onglet');
        $menu->addChild('Autres', ['route' => ''])->setAttribute('class', 'onglet-no-click');
        $menu->addChild('Années', ['route' => 'dates_index'])->setAttribute('class','subonglet');
        $menu->addChild('Villes', ['route' => 'cities_index'])->setAttribute('class','subonglet');
        $menu->addChild('Pays', ['route' => 'countries_index'])->setAttribute('class','subonglet');
        $menu->addChild('Entreprises', ['route' => 'places_index'])->setAttribute('class','subonglet');
        $menu->addChild('Images', ['route' => 'images_index'])->setAttribute('class','subonglet');
        return $menu;
    }
}
