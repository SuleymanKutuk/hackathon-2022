<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Message;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        for($i=0;$i<10;$i++){

            $message = new Message();
            $message->setTitle('messahe_.$i');
            $message->setMessage($faker->paragraph);
            $message->setChannel($this->getReference('channel_'.$i));
            $manager->persist($message);
            
        }

        //$manager->flush();
    }

        public function getDependencies()
    {
        
        return [
          ChannelFixtures::class,
        ];
    }
}
