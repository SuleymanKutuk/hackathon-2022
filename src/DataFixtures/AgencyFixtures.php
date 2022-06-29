<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Agency;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AgencyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr');

        for ($i=0;$i<10;$i++){

            $agency = new Agency();

            $agency->setName($faker->name);
            $agency->setAddress($faker->address);
            $agency->setCity($faker->city);
            $agency->addProject($this->getReference('project_'.$i));
            $agency->addTeam($this->getReference('team_'.$i));
            $this->setReference(('agency_'),$agency);
            $manager->persist($agency);

        }

        $manager->flush();
    }
    public function getDependencies()
    {
        
        return [
          ProjectFixtures::class
        ];
    }

}
