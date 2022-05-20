<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Faker\Factory;
use App\Entity\Image;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker= Factory::create('FR-fr');
        $slugify=new Slugify();

        $title=$faker->sentence();
        $slug=$slugify->slugify($title);
        $coverImage=$faker->imageUrl(1000,300);
        $introduction=$faker->paragraph(2);
        $content= '<p>' .join('</p><p>',$faker->paragraphs(5)).'</p>';

        for($i=1;$i<=30;$i++){
        $ad=new Ad();
        $ad->setTitle($title)
            ->setSlug($slug)
            ->setCoverImage($coverImage)
            ->setIntroduction($introduction)
            ->setContent($content)
            ->setPrice(mt_rand(40,200))
            ->setRooms(mt_rand(1,5));
            for($j=1;$j <= mt_rand(1,5);$j++) {
                $image=new Image();
                $image->setUrl($faker->imageUrl())
                        ->setCaption($faker->sentence())
                        ->setAd($ad);
                $manager->persist($image);
            }   

             // $product = new Product();
        // $manager->persist($product);
        $manager->persist($ad);

        }

        $manager->flush();
    }
}