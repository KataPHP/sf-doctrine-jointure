<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {

        $categories = ['PHP', 'JAVA', 'C#'];

        foreach ($categories as $key => $category) {
            $entity = new Category();
            $entity->setName($category);

            $manager->persist($entity);
            $manager->flush();

            $this->addReference(sprintf('category-%s', $key), $entity);
        }
    }
}
