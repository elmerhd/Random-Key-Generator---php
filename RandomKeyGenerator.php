<?php 

class GenType {
    const DIGITS_ONLY = 0;
    const LETTERS_LOWERCASE = 1;
    const LETTERS_UPPERCASE = 2;
    const LETTERS_UPPERLOWERCASE = 3;
    const DIGITS_LETTERS_LOWERCASE = 4;
    const DIGITS_LETTERS_UPPERCASE = 5;
    const DIGITS_LETTERS_UPPERLOWERCASE = 6;
}

class RandomKeyGenerator {
    function __construct() {
        
    }
    /**
     * Generates a random string from a pattern. <br>
     * for example if want to generate a String like 4Nu40-J91vIw6-0720<br>
     * so basically the pattern is [iXcii-XiixXxi-iiii]<br>
     * escape char for :x,:X,:i
     * c stands for lowercase character,C stands for uppercase character <br>
     * and i stands for integer
     * @param pattern the pattern e.g [iCcii-CiicCci-iiii]
     * @return the generated random key based on pattern
     */
    public function generateByPattern($pattern) {
        $generated = "";
        $start = substr($pattern, 0,1);
        $end = substr($pattern, strlen($pattern)-1);
        if($start !== "[" || $end !== "]" ){
            echo "error";
        }else{
            $pattern = substr($pattern,1, strlen($pattern)-2);
            $arryP = str_split($pattern);
            for ($i = 0; $i < count($arryP); $i++) {
                $c = $arryP[$i];
                switch ($c) {
                    case 'i':
                        if($this->checkifEscapped($pattern, $i)){
                            $generated .= $c;
                        }else{
                            $generated .= $this->g_d();
                        }
                        break;
                    case 'X':
                        if($this->checkifEscapped($pattern, $i)){
                            $generated .= $c;
                        }else{
                            $generated .= $this->g_l_uc();
                        }
                        break;
                    case 'x':
                        if($this->checkifEscapped($pattern, $i)){
                            $generated .= $c;
                        }else{
                            $generated .= $this->g_l_lc();
                        }
                        break;
                    case ':':
                        break;
                    default:
                        $generated .= $c;
                        break;
                }
            }
        }
        return $generated;
    }
    private function checkifEscapped($str,$index){
        if($index === 0){
            return false;
        }else{
            return ($str[$index-1]) === ':';
        }
    }
    /**
     * returns a generated random strings based on <br> type and size.
     * @param type
     * @param size
     * @return the generated random sequence
     */
    public function generate($genType,$size) {
        $generated = "";
        switch ($genType) {
            case GenType::DIGITS_ONLY:
                for ($index = 0; $index < $size; $index++) {
                    $generated = $generated . $this->g_d();
                }
                break;
            case GenType::LETTERS_LOWERCASE:
                for ($index1 = 0; $index1 < $size; $index1++) {
                    $generated = $generated . $this->g_l_lc();
                }
                break;
            case GenType::LETTERS_UPPERCASE:
                for ($index1 = 0; $index1 < $size; $index1++) {
                    $generated = $generated . $this->g_l_uc();
                }
                break;
            case GenType::LETTERS_UPPERLOWERCASE:
                for ($index1 = 0; $index1 < $size; $index1++) {
                    $generated = $generated . $this->g_l_luc();
                }
                break;
            case GenType::DIGITS_LETTERS_LOWERCASE:
                for ($index1 = 0; $index1 < $size; $index1++) {
                    $generated = $generated . $this->g_d_l_lc();
                }
                break;
            case GenType::DIGITS_LETTERS_UPPERCASE:
                for ($index1 = 0; $index1 < $size; $index1++) {
                    $generated = $generated . $this->g_d_l_uc();
                }
                break;
            case GenType::DIGITS_LETTERS_UPPERLOWERCASE:
                for ($index1 = 0; $index1 < $size; $index1++) {
                    $generated = $generated . $this->g_d_l_luc();
                }
                break;
            default:
                break;
        }
        return $generated;
    }
    private function g_d() {
        $num_array = array(0,1,2,3,4,5,6,7,8,9);
        $rand_keys = rand(0,9);
        return $num_array[$rand_keys];
    }
    private function g_l_lc() {
        $low_array = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        $rand_keys = rand(0,25);
        return $low_array[$rand_keys];
    }
    private function g_l_uc() {
        $low_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $rand_keys = rand(0,25);
        return $low_array[$rand_keys];
    }
    private function g_l_luc() {
        $rand_k = rand(0,1);
        if($rand_k == 0){
            return $this->g_l_lc();
        } else if($rand_k == 1){
            return $this->g_l_uc();
        }
    }
    private function g_d_l_lc() {
        $rand_k = rand(0,1);
        if($rand_k == 0){
            return $this->g_d();
        } else if($rand_k == 1){
            return $this->g_l_lc();
        }
    }
    private function g_d_l_uc() {
        $rand_k = rand(0,1);
        if($rand_k == 0){
            return $this->g_d();
        } else if($rand_k == 1){
            return $this->g_l_uc();
        }
    }
    private function g_d_l_luc() {
        $rand_k = rand(0,2);
        if($rand_k == 0){
            return $this->g_d();
        } else if($rand_k == 1){
            return $this->g_l_lc();
        } else if($rand_k == 2){
            return $this->g_l_uc();
        }
    }
}


