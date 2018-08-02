<?php

use PHPUnit\Framework\TestCase;

require_once 'PinGenerator.php';

Class PinTest extends TestCase 
{

  protected $pinGenerator;
  protected $pinCodes;

  /**
   * A Setup for creating an instance of the PinGenerator Class and generate the Pincodes 
   * to use the same pincodes throughout the test. 
   */
  public function setUp() 
  {
    $this->pinGenerator = new PinGenerator;
    $this->pinCodes = $this->pinGenerator->generatePin();
  }

  /**
   * This Function returns a set of array with same consecutive numbers.
   */
  public function inputForSamePinCodes()
  {
    return [
            ['1122'], 
            ['2233'],
            ['4455'],
            ['6677'],
            ['8899']
          ];
  }

  /**
   * @dataProvider inputForSamePinCodes
   * Test case to check if the given pin have the same consecutive numbers.
   * If the Pin code have the same consecutive numbers, the function will assert true.
   */
  public function testConsecutiveNumbersAreSame($pin)
  {
    $this->assertTrue($this->pinGenerator->twoSameNumbers($pin), 'The Pincode '.$pin.' dont have same consecutive Numbers');
  }

  /**
   * This Function returns a set of array with different consecutive numbers.
   */
  public function inputForDifferentConsecutiveNumbers()
  {
    return [
      ['1234'], 
      ['5678'],
      ['9012'],
      ['3456'],
      ['7890']
    ];
  }

  /**
   * @dataProvider inputForDifferentConsecutiveNumbers
   * Test case to check if the given pin dont have the same consecutive numbers.
   * If the Pin code dont have the same consecutive numbers, the function will assert false.
   */  
  public function testConsecutiveNumbersAreNotSame($pin)
  {
    $this->assertFalse($this->pinGenerator->twoSameNumbers($pin), 'The Pincode '.$pin.' have same consecutive Numbers');
  }

  /**
   * This Function returns a set of array with incremental consecutive numbers.
   */
  public function inputForIncrementalConsecutiveNumbers()
  {
    return [
      ['1234'], 
      ['5678'],
      ['2345'],
      ['6789'],
      ['3456']
    ];
  }

  /**
   * @dataProvider inputForIncrementalConsecutiveNumbers
   * Test case to check if the given pin have incremental consecutive numbers.
   * If the Pin code dont have incremental consecutive numbers, the function will assert true.
   */ 
  public function testIncrementalConsecuriveNumbers($pin)
  {
    $this->assertTrue($this->pinGenerator->incrementalNumbers($pin), 'The Pincode '.$pin.' dont have incremental consecutive Numbers');
    
  }

  /**
   * This Function returns a set of array with non incremental consecutive numbers.
   */
  public function inputForNonIncrementalConsecutiveNumbers()
  {
    return [
      ['2234'], 
      ['1436'],
      ['5692'],
      ['4585'],
      ['9268']
    ];
  }

  /**
   * @dataProvider inputForNonIncrementalConsecutiveNumbers
   * Test case to check if the given pin dont have incremental consecutive numbers.
   * If the Pin code have incremental consecutive numbers, the function will assert false.
   */ 
  public function testNonIncrementalConsecuriveNumbers($pin)
  {
    $this->assertFalse($this->pinGenerator->incrementalNumbers($pin), 'The Pincode '.$pin.' have incremental consecutive Numbers'); 
  }

  /**
   * Test case to count the total number of pin codes generated.
   */
  public function testCountPinCodes() 
  {
    $this->assertEquals(1000, $this->pinGenerator->countPinCodes($this->pinCodes), 'Not 1000 Pins');
  }

}