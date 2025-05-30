<?php
namespace ApplicationInsights\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Contains tests for Current_User class
 */
class Current_User_Test extends TestCase
{
    private $userId;

    protected function setUp(): void
    {
        $this->userId = \ApplicationInsights\Channel\Contracts\Utils::returnGuid();
        Utils::setUserCookie($this->userId);
    }

    protected function tearDown(): void
    {
        Utils::clearUserCookie();
    }

    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructor()
    {
        $currentUser = new \ApplicationInsights\Current_User();

        $this->assertEquals($currentUser->id, $this->userId);
    }

    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructorWithNoCookie()
    {
        Utils::clearUserCookie();
        $currentUser = new \ApplicationInsights\Current_User();

        $this->assertTrue($currentUser->id != null && $currentUser->id != $this->userId);
    }

}
