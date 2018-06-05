<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        $user = new User();
            
        $user->setEmail('claire.bourgeois.cb@gmail.com');
        $user->setUsername('claireb_admin');
        $user->setPassword('1234@2018');

        $manager->persist($user);
        

        $manager->flush();
    }
}