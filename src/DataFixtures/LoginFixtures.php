<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginFixtures extends Fixture
{



    private $passwordHasher;


    public function __construct(

        UserPasswordHasherInterface $passwordHasher
    ) {

        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');


        for ($i = 0; $i < 10; $i++) {
            $user = new User();

            $user->setEmail($faker->email);
            $user->setFirstname('Kutuk');
            $user->setlastname('Yavuz');
            $user->setPassword('password');
            $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
            $this->addReference('user_'.$i,$user);
        }
        $manager->flush();
    }
}
