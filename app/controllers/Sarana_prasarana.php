<?php 

class Sarana_prasarana extends Controller {

public function index() {

    $this->view('template/header');
    $this->view('sarana_prasarana/index');

}
}