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
        $user->setEmail('superadmin@gmail.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$REZWSlgzRmNmSUxzaE1Vag$1TBn2gh9SY1FpVYCsPzr8pGLqshU2g9SWe/uD4LeQF0');
        $manager->persist($user);
        
        //Admin
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$REZWSlgzRmNmSUxzaE1Vag$1TBn2gh9SY1FpVYCsPzr8pGLqshU2g9SWe/uD4LeQF0');
        $manager->persist($user);
        
        //User
        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$REZWSlgzRmNmSUxzaE1Vag$1TBn2gh9SY1FpVYCsPzr8pGLqshU2g9SWe/uD4LeQF0');
        $manager->persist($user);

        $manager->flush();
    }
}
