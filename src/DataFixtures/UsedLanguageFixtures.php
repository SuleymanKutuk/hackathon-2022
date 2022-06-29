<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\UsedLanguage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UsedLanguageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr');

        for($i=0;$i<10;$i++){
            $usedLanguage = new UsedLanguage();
            $usedLanguage->setName($faker->randomElement(['Java','c#','C++','php','node','Symfony','react','JS']));
            $usedLanguage->addProjectType($this->getReference('projectType_'.$i));
            $manager->persist($usedLanguage);
        }

            

        $manager->flush();
    }
    public function getDependencies()
    {
        
        return [
          ProjectTypeFixtures::class,
        ];
    }
}
