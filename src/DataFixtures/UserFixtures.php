<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //Super Admin
        $user = new User();
        $user->setEmail('thlecacheux@gmail.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$eWJZdnFlRFNqZXR2Mmp0Mw$5OixuVBelrXn0ipK2O3iQnjtD55yo0JCAMl8aXSw2oU');
        $manager->persist($user);
        
        //Admin
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$eWJZdnFlRFNqZXR2Mmp0Mw$5OixuVBelrXn0ipK2O3iQnjtD55yo0JCAMl8aXSw2oU');
        $manager->persist($user);
        
        //User
        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$eWJZdnFlRFNqZXR2Mmp0Mw$5OixuVBelrXn0ipK2O3iQnjtD55yo0JCAMl8aXSw2oU');
        $manager->persist($user);

        $manager->flush();
    }
}
