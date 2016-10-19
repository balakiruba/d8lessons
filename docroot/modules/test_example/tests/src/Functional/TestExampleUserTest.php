<?php

/**
 * @file
 *
 * Contains \Drupal\Tests\test_example\Functional\TestExampleUserTest.
 */

namespace Drupal\Tests\test_example\Functional;

use Drupal\simpletest\BrowserTestBase;

/**
 * Check if our user field works.
 *
 * @group test_example
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class TestExampleUserTest extends BrowserTestBase {

  /**
   * @var \Drupal\user\Entity\User.
   */
  protected $user;

  /**
   * Enabled modules
   */
  public static $modules = ['test_example'];

  /**
   * {@inheritdoc}
   */
  function setUp() {
    parent::setUp();

    $this->user = $this->drupalCreateUser();
  }

  /**
   * Test that the user has a test_status field.
   */
  public function testUserHasTestStatusField() {
    $this->assertTrue(in_array('test_status', array_keys($this->user->getFieldDefinitions())));
  }

}
