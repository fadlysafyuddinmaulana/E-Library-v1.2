<?php
$user = $this->session->userdata('server_library');

if ($user['role'] == 'admin') {
    $this->load->view('layout/sidebar');
} else {
    $this->load->view('layout/sidebar');
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
</nav>
<!-- /.navbar -->