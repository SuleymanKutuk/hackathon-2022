<?php

namespace App\DataFixtures;
use DateTime;
use Faker\Factory;
use App\Entity\ProjectType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ProjectTypeFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);$faker = Factory::create('fr');
        $faker = Factory::create();

        for($i=0;$i<10;$i++){
          
            $date = new DateTime('now');

            $projectType = new ProjectType();
            $projectType->setType($faker->randomElement(['Mobile App','Showcase site']));
            $this->setReference('projectType_'.$i,$projectType);
            $manager->persist($projectType);

           
        }
        

        $manager->flush();
    }

    
}
