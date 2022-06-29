<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Status;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr');

        for($i=0;$i<10;$i++){

            $status = new Status();

            $status->setStatus($faker->randomElement(['being treated','in testing','treated']));
            $this->addReference('status_'.$i,$status);
            $manager->persist($status);
        }

        $manager->flush();
    }
}
