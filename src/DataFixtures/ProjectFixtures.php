<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr');

        for($i=0;$i<10;$i++){
          
            $date = new DateTime('now');

            $project = new Project();
            $project->settitle($faker->name);
            $project->setStatus($faker->randomElement(['status_01','status_02','status_03']));
            $project->setCreatedOn($date);
            $project->setDeadline($date);
            $project->setWorkSpace($this->getReference('workSpace_'.$i));
            $project->setProjectType($this->getReference('projectType_'.$i));
            $this->addReference('project_'.$i,$project);
            $manager->persist($project);

        }
        $manager->flush();
    }
    public function getDependencies()
    {
        
        return [
          ProjectTypeFixtures::class,
          WorkSpaceFixtures::class,
        ];
    }
}
