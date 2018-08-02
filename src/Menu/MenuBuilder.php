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
        $menu['Expériences']->addchild('nouveau', ['route' => 'experiences_new']);
        $menu->addChild('Formation', ['route' => 'school_index'])->setAttribute('class','onglet');
        $menu['Formation']->addchild('nouveau', ['route' => 'school_new']);
        $menu->addChild('Compétences', ['route' => 'skills_index'])->setAttribute('class','onglet');
        $menu['Compétences']->addchild('nouveau', ['route' => 'skills_new']);
      
        $menu->addChild('Projets', ['route' => 'projects_index'])->setAttribute('class','onglet');
        
        $menu['Projets']->addchild('nouveau', ['route' => 'projects_new']);
        $menu->addChild('Autres', ['route' => ''])->setAttribute('class', 'onglet-no-click');
        $menu->addChild('Années', ['route' => 'dates_index'])->setAttribute('class','subonglet');
        $menu['Années']->addchild('nouveau', ['route' => 'dates_new']);
        $menu->addChild('Villes', ['route' => 'cities_index'])->setAttribute('class','subonglet');
        $menu['Villes']->addchild('nouveau', ['route' => 'cities_new']);
        $menu->addChild('Pays', ['route' => 'countries_index'])->setAttribute('class','subonglet');
        $menu['Pays']->addchild('nouveau', ['route' => 'countries_new']);
        $menu->addChild('Entreprises', ['route' => 'places_index'])->setAttribute('class','subonglet');
        $menu['Entreprises']->addchild('nouveau', ['route' => 'places_new']);
        $menu->addChild('Images', ['route' => 'images_index'])->setAttribute('class','subonglet');
        $menu['Images']->addchild('nouveau', ['route' => 'images_new']);

        $request= $requestStack->getCurrentRequest();
        if ($request->get('id')){
        $menu['Projets']->addchild('modifier', ['route' => 'projects_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Projets']->addchild('voir', ['route' => 'projects_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Expériences']->addchild('modifier', ['route' => 'experiences_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Expériences']->addchild('voir', ['route' => 'experiences_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Formation']->addchild('modifier', ['route' => 'school_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Formation']->addchild('voir', ['route' => 'school_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Compétences']->addchild('modifier', ['route' => 'skills_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Compétences']->addchild('voir', ['route' => 'skills_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Profil']->addchild('modifier', ['route' => 'presentation_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Profil']->addchild('voir', ['route' => 'presentation_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Années']->addchild('modifier', ['route' => 'dates_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Années']->addchild('voir', ['route' => 'dates_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Villes']->addchild('modifier', ['route' => 'cities_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Villes']->addchild('voir', ['route' => 'cities_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Pays']->addchild('modifier', ['route' => 'countries_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Pays']->addchild('voir', ['route' => 'countries_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Entreprises']->addchild('modifier', ['route' => 'places_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Entreprises']->addchild('voir', ['route' => 'places_show', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Images']->addchild('modifier', ['route' => 'images_edit', 'routeParameters' => ['id' => $request->get('id')]] );
        $menu['Images']->addchild('voir', ['route' => 'images_show', 'routeParameters' => ['id' => $request->get('id')]] );
        }

        
        
        return $menu;
    }
}
