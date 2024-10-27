<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Number;

class CalsController extends Controller
{
    public function index(){
    $num1 = $this->request->getQuery('num1');
    $num2 = $this->request->getQuery('num2');
    $menu = $this->request->getQuery('menu');
    $result = null;
    $message = null;

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $message = "Enter Valid Inputs!!";
    } else {
        $num1 = floatval($num1);
        $num2 = floatval($num2);

        if ($menu == 'Addition') {
            $result = $num1 + $num2;
        } elseif ($menu == 'Subtraction') {
            $result = $num1 - $num2;
        } elseif ($menu == 'Multiplication') {
            $result = $num1 * $num2;
        } elseif ($menu == 'Division') {
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = 'Cannot divide by zero';
            }
        }
    }

    $this->set(compact('result','message'));
    $this->viewBuilder()->setLayout('custom');
    }
    
}



