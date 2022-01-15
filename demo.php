<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// function counter($start,& $stop){
//     if($stop > $start){
//         return ;
//     }
//     // echo 'this';
//     // echo "<br>";
//     counter($start--,++$stop);

// }
// $start =5;
// $stop =2;
// counter($start,$stop);






// function z($x){
//     return function($y) use($x){
//         return str_repeat($y,$x);
//     };
// }
// $a =z(2);
// $b =z(3);

// echo $a(3).$b(2);





// function ratio($x1=10,$x2){

// if(isset($x2)){
// return $x2/$x1 ;
// }
// }

// echo ratio(0);

?>



<?php
class Fruit {
  
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

// $a = new Fruit;
// // var_dump($a instanceof Fruit);
// $a->set_name('apple');
// echo $a->get_name();


class Fruits {
  public $name;
    public $namea;
}
$apple = new Fruits();
 $apple->name = "Apple";
 $apple->names = "Apples";



class ClassName {
  public static function staticMethod() {
    echo "Hello World!";
  }
}


// echo ClassName::staticMethod();
// $obj = new ClassName;
// echo $obj->staticMethod();




class greeting {
  public static function welcome() {
    echo "greeting Hello World! greeting";
  }
  public function __construct() {
    self::welcome();
  }
}

// new greeting();





   final class Base {
      final function display() {
         echo "Base class function declared final!";
      }
      function demo() {
         echo "Base class function!";
      }
   }
   class Derived extends Base {
      function demo() {
         echo "Derived class function!";
      }
   }
   $ob = new Derived;
   $ob->demo();















?>