<?php

namespace App\DataFixtures;

use App\Entity\Chat;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChatFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr');


        for($i=0;$i<10;$i++){

            $chat = new Chat();

            $chat->setName($faker->name);
            $chat->setWorkSpace($this->getReference('workSpace_'.$i));
            $this->addReference('chat_'.$i,$chat);
            $manager->persist($chat);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        
        return [
          WorkSpaceFixtures::class,
        ];
    }
}
