<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\TeamWorkSpace;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamWorkSpaceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr');

        for($i=0;$i<10;$i++){

            $teamWorkSpace = new TeamWorkSpace();
            $teamWorkSpace->setIsGranted(false);
            $teamWorkSpace->setProposition($faker->paragraph);
            $teamWorkSpace->setTeam($this->getReference('team_'.$i));
            $teamWorkSpace->setWorkSpace($this->getReference('workSpace_'.$i));
            $this->addReference('teamWorkSpace_'.$i,$teamWorkSpace);
            $manager->persist($teamWorkSpace);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        
        return [
          TeamFixtures::class,
        ];
    }
}
