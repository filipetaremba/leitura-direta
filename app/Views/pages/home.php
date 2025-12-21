<?= $this->extend('layouts/layout_base') ?>

<?= $this->section('css') ?>
<style>


</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<?=  $this->include('components\maisAvaliado') ?>
<?=  $this->include('components\maisVendidos') ?>
<?=  $this->include('components\banner') ?>
<?=  $this->include('components\categorias') ?>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>


</script>
<?= $this->endSection() ?>
