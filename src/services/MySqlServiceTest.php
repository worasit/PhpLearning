<?php
/**
 * Created by PhpStorm.
 * User: worasitdaimongkol
 * Date: 5/24/18
 * Time: 12:00 AM
 */

namespace PHPUPhar\services;

use MySqlService;
use PHPUnit\Framework\TestCase;

require "MySqlService.php";

class MySqlServiceTest extends TestCase
{

    private $mySqlService = null;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        // Arrange
        $host = "127.0.0.1";
        $port = 8889;
        $user = "root";
        $pass = "root";
        $this->mySqlService = new MySqlService($host, $port, $user, $pass);
    }

    public function testConnect()
    {
        // Arrange
        $expect = true;

        // Act
        $actual = $this->mySqlService->connect();

        // Assert
        $this->assertEquals($expect, $actual);
    }


    public function testGetHost()
    {
        // Arrange
        $expect = "127.0.0.1";

        // Act
        $actual = $this->mySqlService->getHost();

        // Assert
        $this->assertEquals($expect, $actual);
    }

    public function testGetPort()
    {
        // Arrange
        $expect = 8889;

        // Act
        $actual = $this->mySqlService->getPort();

        // Assert
        $this->assertEquals($expect, $actual);
    }

    public function testGetPass()
    {
        // Arrange
        $expect = "root";

        // Act
        $actual = $this->mySqlService->getPass();

        // Assert
        $this->assertEquals($expect, $actual);
    }

    public function testGetConnStr()
    {
        // Arrange
        $expect = "mysql:host=127.0.0.1;port=8889;";

        $actual = $this->mySqlService->getConnStr();

        // Assert
        $this->assertEquals($expect, $actual);
    }

    public function testGetUser()
    {
        // Arrange
        $expect = "root";

        // Act
        $actual = $this->mySqlService->getUser();

        // Assert
        $this->assertEquals($expect, $actual);
    }

    public function testCreateDB()
    {
        // Act
        $actual = $this->mySqlService->createDB("test");

        // Assert
        $this->assertEquals(true, $actual);
    }
}
