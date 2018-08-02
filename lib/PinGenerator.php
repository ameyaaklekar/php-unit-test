<?php

Class PinGenerator 
{

  /**
   * This function generates a set of 1000 random pincodes
   */
  public function generatePin() 
  {
    $pinArray = [];

    for($i = 1; $i <= 1000; $i++) {
      $pinCode = rand(1000, 9999);
      $sameNumbers = $this->twoSameNumbers($pinCode);
      $incrementalNumbers = $this->incrementalNumbers($pinCode);
      
      if (!in_array($pinCode, $pinArray) && !$sameNumbers && !$incrementalNumbers) {
        $pinArray[] = $pinCode;
      } elseif ($i != 0) {
        $i--;
      }
    }

    return $pinArray;
  }

  /**
   * This function checks if two consecutive numbers are same.
   * It returns a boolean true if two consecutive numbers are same. By default returns false.
   */
  public function twoSameNumbers($pinCode) 
  {
    $pinCodeSplit = str_split($pinCode);

    for ($i = 0; $i < count($pinCodeSplit); $i++) {
      if ($i < (count($pinCodeSplit) - 1)) {
        if ($pinCodeSplit[$i] == $pinCodeSplit[$i + 1]) {
          return true;
          break;
        }
      }
    }
  
    return false;
  }
  
  /**
   * This fucntion checks if the three consecutive numbers are Incremental.
   * It returns a boolean true if three xonsecutive numbers are Incremental. By default return false. 
   */
  public function incrementalNumbers($pinCode) 
  {
    $pinCodeSplit = str_split($pinCode);

    if ($pinCodeSplit[1] == ($pinCodeSplit[0]+1) && $pinCodeSplit[2] == ($pinCodeSplit[1]+1)) {
      return true;
    }
    
    return false;
  }

  public function countPinCodes($pinCodes)
  {
    return count($pinCodes);
  }

}

