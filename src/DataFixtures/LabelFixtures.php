<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Label;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class LabelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr');

        for($i=0;$i<10;$i++){

            $label = new Label();

            $label->setLabel($faker->colorName);
            $this->addReference('label_'.$i,$label);
            $manager->persist($label);
            
        }



        $manager->flush();
    }
}
