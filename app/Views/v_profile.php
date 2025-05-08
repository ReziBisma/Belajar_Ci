<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<br>ini halaman Profile<br>

<li>Username: <?=session()->get('username');?></li>
<li>Role: <?=session()->get('role');?></li>
<li>Email: <?=session()->get('email');?></li>
<li>Waktu Login: <?=session()->get('login_time');?></li>
<li>Status: <?=session()->get('status');?></li>

<?= $this->endSection() ?>