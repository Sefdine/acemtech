<?php
class Apropos extends Controller {
    public function index() {
        $data = [
            'current_about' => 'current',
        ];

        $this->view('pages/apropos', $data);
    }
}