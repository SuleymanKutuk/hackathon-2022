<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Channel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;

class ChannelFixtures extends Fixture implements DependentFixtureInterface


{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        for($i=0;$i<10;$i++){

            $channel = new Channel();
            $channel->setName($faker->name);
            $channel->setChat($this->getReference('chat_'.$i));
            $this->addReference('channel_'.$i,$channel);
            $manager->persist($channel);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        
        return [
          ChatFixtures::class,
        ];
    }

}
