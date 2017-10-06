<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Address;
use AppBundle\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; ++$i) {
            $customer = (new Customer())
                ->setFullName($faker->name)
                ->setEmail($faker->email)
                ->setPhoneNumber($faker->phoneNumber);

            $address = (new Address())
                ->setStreet($faker->streetAddress)
                ->setZipCode($faker->postcode)
                ->setCity($faker->city)
                ->setCountry($faker->country);

            $customer->addAddress($address);

            $manager->persist($customer);
            $manager->flush();

            $this->addReference(sprintf('customer-%s', $i), $customer);
        }
    }
}
