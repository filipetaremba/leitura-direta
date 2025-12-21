<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>


<?=  $this->include('components\maisAvaliado') ?>
<?=  $this->include('components\maisVendidos') ?>
<?=  $this->include('components\banner') ?>
<?=  $this->include('components\categorias') ?>
<?=  $this->include('components\sobrenos') ?>
<?=  $this->include('components\maisLivros') ?>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>
