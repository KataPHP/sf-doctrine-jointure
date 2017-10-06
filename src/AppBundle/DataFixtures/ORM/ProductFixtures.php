<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 50; ++$i) {
            $categories[] = $this->getReference(sprintf('category-%s', rand(0, 2)));

            $product = (new Product())
                ->setName(sprintf('product %s', $i))
                ->setDescription($faker->text(300))
                ->setPrice($faker->randomFloat())
                ->setCategories(new ArrayCollection($categories));

            $manager->persist($product);
            $manager->flush();

            $this->addReference(sprintf('product-%s', $i), $product);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
        );
    }
}
