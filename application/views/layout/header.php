<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'My Application'; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <header>
        <h1><?php echo isset($title) ? $title : 'My Application'; ?></h1>
        <nav>
            <ul>
                <li><a href="<?php echo site_url('admin'); ?>">Admin</a></li>
                <li><a href="<?php echo site_url('customer'); ?>">Customer</a></li>
                <li><a href="<?php echo site_url('buku'); ?>">Buku</a></li>
                <li><a href="<?php echo site_url('category'); ?>">Category</a></li>
                <li><a href="<?php echo site_url('order'); ?>">Order</a></li>
                <li><a href="<?php echo site_url('order_item'); ?>">Order Item</a></li>
            </ul>
        </nav>
    </header>
