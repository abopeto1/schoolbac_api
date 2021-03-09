<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin
            ->setEmail('abopeto1@gmail.com')
            ->setLogin('abopeto')
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$bjRtSEVaYzdJejNFNXJZdg$cYqFkhyvylU8D95SYjCBVcJFQcHxW7h39ZwXynAjGcc')
            ;
        $manager->persist($admin);

        $manager->flush();
    }
}
