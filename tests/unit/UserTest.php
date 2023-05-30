<?php

require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    
    public function testThatWeCanGetTheFirstName()
    {
        $user = new App\Models\User;

        $user->setFirstName('Billy');

        $this->assertEquals($user->getFirstName(), 'Billy');
    }

    public function testStubs()
    {
        
        $stub = $this->createStub(App\Models\User::class);

        $stub->method('getFirstName')->will($this->returnValue("Billy"));

        $this->assertEquals($stub->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new App\Models\User;

        $user->setLastName("roger");

        $this->assertEquals($user->getLastName(), "roger");

    }

    public function testThatWeCanGetTheFullName()
    {
        $user = new App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName("roger");

        $this->assertEquals($user->getFullName(), "Billy roger");

    }

    public function testThatTheFirstNameAndTheLastNameAreTrimmed()
    {
        $user = new App\Models\User;

        $user->setFirstName('    Billy');
        $user->setLastName("roger    ");

        $this->assertEquals($user->getFullName(), "Billy roger");

    }

    public function testThatTheEmailCanBeSet()
    {
        $user = new App\Models\User;

        $user->setEmail("billy@yahoo.com");

        $this->assertEquals($user->getEmail(), "billy@yahoo.com");
    }

    public function testThatEmailVariablesContainTheCorrectInformation()
    {
        $user = new App\Models\User;

        $user->setFirstName('Billy');
        $user->setLastName("roger");
        $user->setEmail("billy@yahoo.com");

        $email_variables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $email_variables);
        $this->assertArrayHasKey('email', $email_variables);

        $this->assertEquals($email_variables['full_name'], 'Billy roger');
        $this->assertEquals($email_variables['email'], 'billy@yahoo.com');

    }
}

/*
important Notes:
1:if your properties are protected instead of pubilc you won't need to check if the email has the correct values because in this case you
  in this case will be the only person who can manipulate those properties because we are only doing this test in case someone has
  manipulated his data

2: if the properties are public you probably won't need getters you just access the property fast-forwadly like so $obj->property without
   the $ sign 

*/

