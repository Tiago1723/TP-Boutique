<?php
class HomeController extends Controller {
    public function index() {
        try {

            $this->view('home', []);
        } catch (Throwable $e) {
            http_response_code(500);
            echo "View Rendering Error: " . htmlspecialchars($e->getMessage());
        }
    }
}
