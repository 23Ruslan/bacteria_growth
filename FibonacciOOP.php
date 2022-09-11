<?php // it's not a fibonacci number, but it's very similar, especially in math
final class FibonacciOOP {
    private $n;
    public function __get($name){
        if ('n' === $name) 
            return $this->n;
        return 'not found';
    }
    public function __set ($property, $value) {
        if ('n' === $property) 
            $this->n = $value;
    }
    public function __construct (?float $n = 15) {
        $this->n = $n;
    }
    public function fibonacciNumbersDirectly() : ?float { // direct calculation, for testing only
        $green  = 1;
        $red    = 1;
        for ($i = 1; $i < $this->n; $i++) {
            $temp   = $green;
            $green  = 3 * $green + 7 * $red;
            $red    = 4 * $temp  + 5 * $red;
            $result = ($i == $this->n - 1) ? ($green + $red) : 0;
        }
        return $result;
    }
    public function fibonacciNumbersBinet() : ?string { // formula similar to Binet formula for Fibonacci numbers
        // from the problem statement: sum(m) = 8sum(m-1) + 13sum(m-2)
        // ( (11+2*sqrt(29)) (4+sqrt(29))^(n-1) - (11-2*sqrt(29)) (4-sqrt(29))^(n-1) ) / (2sqrt(29))
        bcscale(1000); // php extension for high precision numbers
        $sqrt1 = bcsqrt('29');
        $sqrt2 = bcmul('2', $sqrt1);
        $a     = bcadd('4', $sqrt1); 
        $b     = bcsub('4', $sqrt1); 
        $a     = bcmul( bcadd('11', $sqrt2), bcpow($a, $this->n - 1) );
        $b     = bcmul( bcsub('11', $sqrt2), bcpow($b, $this->n - 1) );
        return ($this->n == 1) ? bcdiv( bcsub($a, $b), $sqrt2, 0) : 
                bcadd( bcdiv( bcsub($a, $b), $sqrt2, 0), 1, 0); // much greater precision
    /*  return $sqrt1 * ((11 + $sqrt2) * pow(4 + $sqrt1, $this->n - 1) - // much less precision
                11 - $sqrt2) * pow(4 - $sqrt1, $this->n - 1)) / 58; */
    }
}