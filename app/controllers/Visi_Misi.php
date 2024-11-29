<?php

class Visi_Misi extends Controller
{

    public function index()
    {
        $this->view('template/header');
        $this->view('visi_misi/page');
    }
}
