<?php

class visi_misi extends Controller
{

    public function index()
    {
        $this->view('template/header');
        $this->view('visi_misi/page');
    }
}
