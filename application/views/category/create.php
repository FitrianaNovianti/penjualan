<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <?php $this->load->view('templates/header', array('title' => 'Create Category')); ?>

    <h1>Create Category</h1>

    <?php echo validation_errors(); ?>

    <?php echo form_open('category/create'); ?>

        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo set_value('name'); ?>"><br>

        <label for="description">Description</label>
        <textarea name="description"><?php echo set_value('description'); ?></textarea><br>

        <label for="status">Status</label>
        <select name="status">
            <option value="active" <?php echo set_select('status', 'active', TRUE); ?>>Active</option>
            <option value="inactive" <?php echo set_select('status', 'inactive'); ?>>Inactive</option>
        </select><br>

        <input type="submit" name="submit" value="Create Category">

    <?php echo form_close(); ?>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>
