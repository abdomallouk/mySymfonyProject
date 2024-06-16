<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('Great Film');
        $movie->setReleaseYear(2000);
        $movie->setDescription('this is the great description of th Great Film');
        $movie->setImagePath('https://ntvb.tmsimg.com/assets/p8696131_b_h10_aa.jpg?w=960&h=540');

        //Add data to pivot Table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Amazing Film');
        $movie2->setReleaseYear(2089);
        $movie2->setDescription('this is the great description of th amazing Film');
        $movie2->setImagePath('https://ntvb.tmsimg.com/assets/p8696131_b_h10_aa.jpg?w=960&h=540');

        //Add data to pivot Table
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));

        $manager->persist($movie2);

        $manager->flush();
    }
}
