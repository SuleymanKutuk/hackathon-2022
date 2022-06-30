<?php

namespace App\DataFixtures;

use App\Entity\WorkSpace;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class WorkSpaceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        for($i=0;$i<10;$i++){

            $workSpace = new WorkSpace();

            $workSpace->setName($faker->name);
            $workSpace->setInterested(false);
            $manager->persist($workSpace);
            $this->addReference('workSpace_'.$i,$workSpace);
        }
        

        $manager->flush();
    }
}
