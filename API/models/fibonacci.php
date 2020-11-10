<?php

  class Fibonacci{

    public Int $firstNumber;
    public Int $secondNumber;

    
    public function __construct(){
      $this->firstNumber = 0;
      $this->secondNumber = 1;
    }

    /**
    * Return a sequence of Fibonacci
    * @param int The length of the sequence
    * @return array numbers of Fibonacci
     */
    public function getFibonacciIterative(int $n): array {

      $fib = [$this->firstNumber, $this->secondNumber];
      for($i=1;$i<$n;$i++)
      {
          $fib[] = $fib[$i]+$fib[$i-1];
      }
      return $fib;
    }
  }