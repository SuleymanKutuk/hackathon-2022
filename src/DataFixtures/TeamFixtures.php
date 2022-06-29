<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Team;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class TeamFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr');


        for($i=0;$i<10;$i++){

            $team = new Team();
            $team->setName($faker->name);
            $team->addUser($this->getReference('user_'.$i));
            $manager->persist($team);
            $this->addReference('team_'.$i,$team);

        }



        $manager->flush();
    }
    public function getDependencies()
    {
        
        return [
          
          LoginFixtures::class,
        ];
    }


}
