<?php

// class to convert integer to roman
class RomanConversion
{
    private $num;
    private $converted_roman= '';

    // setter function to set the integer
    public function setNumber($number)
    {
        $this->num = $number;
       
    }

    // getter function to get the integer
    public function getNumber()
    {
        echo $this->num;
    }

    // function to convert integer to roman
    public function convertToRoman()
    {

    // checking if the integer lies between 1 and 3999, if not give alert
        if ($this->num < 1 or $this->num >= 4000) {
            $message = "The number entered should be between 1 and 3999";
            echo "<script> alert('$message'); </script>";
            exit();
        } else {
            echo "The given input number is: " . $this->num;

            echo ("<br><br><hr><br>");
            echo ("The converted output is:");

            // logic to convert into roman numerals
            while ($this->num > 0) {
                if ($this->num > 1000) {
                    $this->converted_roman = $this->converted_roman . 'M';
                    $this->num = $this->num - 1000;
                } elseif ($this->num >= 900) {
                    $this->converted_roman = $this->converted_roman . 'CM';
                    $this->num = $this->num - 900;
                } elseif ($this->num >= 500) {
                    $this->converted_roman = $this->converted_roman . 'D';
                    $this->num = $this->num - 500;
                } elseif ($this->num >= 400) {
                    $this->converted_roman = $this->converted_roman . 'CD';
                    $this->num = $this->num - 400;
                } elseif ($this->num >= 100) {
                    $this->converted_roman = $this->converted_roman . 'C';
                    $this->num = $this->num - 100;
                } elseif ($this->num >= 90) {
                    $this->converted_roman = $this->converted_roman . 'XC';
                    $this->num = $this->num - 90;
                } elseif ($this->num >= 50) {
                    $this->converted_roman = $this->converted_roman . 'L';
                    $this->num = $this->num - 50;
                } elseif ($this->num >= 40) {
                    $this->converted_roman = $this->converted_roman . 'XL';
                    $this->num = $this->num - 40;
                } elseif ($this->num >= 10) {
                    $this->converted_roman = $this->converted_roman . 'X';
                    $this->num = $this->num - 10;
                } elseif ($this->num == 9) {
                    $this->converted_roman = $this->converted_roman . 'IX';
                    $this->num = $this->num - 9;
                } elseif ($this->num >= 5) {
                    $this->converted_roman = $this->converted_roman . 'V';
                    $this->num = $this->num - 5;
                } elseif ($this->num == 4) {
                    $this->converted_roman = $this->converted_roman . 'IV';
                    $this->num = $this->num - 4;
                } elseif ($this->num >= 1) {
                    $this->converted_roman = $this->converted_roman . 'I';
                    $this->num = $this->num - 1;
                }
            }
    
            echo("<br>");
            echo ("<h3 style='color: maroon;'>$this->converted_roman</h3>");
            
            echo("<hr>");

            //Thought process for the logic 
            echo ("The pseudocode for the algorithm goes like: ");
            echo ("<br><br>");


            echo ("1.Take the number from form. Convert it to integer.<br>");
            echo ("2.Declare empty string, say $this->converted_roman to store converted roman numerals. <br>");
            echo ("3.Run while loop until the number is greater than 0.Check if the number is greater than or equal to 1000. If so add 'M' to the converted_roman and reduce 1000 from the number.<br>");
            echo ("3.Else if the number is greater than or equal to 900 concatenate 'CM' to the converted_roman.<br>");
            echo ("4. In the same manner add rules for concatenation of 'D','CD','C','XC','L','XL','X','IX','V','IV' and 'I'.<br>");
            echo ("5. Finally after the loop is over print the roman numberals.<br>");
            echo ("<br>Below is the leetcode solution: <br>");
            $imgPath = './ss.png';
            echo ("<img src='$imgPath'/>");
        }
    }
}

// taking the integer from form 
$number = (int)$_POST["integer"];

// creating new object
$num = new RomanConversion();

// invoking setter function
$num->setNumber($number);

// invoking the method for conversion
$num->convertToRoman();