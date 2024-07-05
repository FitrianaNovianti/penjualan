<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <?php $this->load->view('templates/header', array('title' => 'Edit Category')); ?>

    <h1>Edit Category</h1>

    <?php echo validation_errors(); ?>

    <?php echo form_open('category/edit/'.$category['id']); ?>

        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo set_value('name', $category['name']); ?>"><br>

        <label for="description">Description</label>
        <textarea name="description"><?php echo set_value('description', $category['description']); ?></textarea><br>

        <label for="status">Status</label>
        <select name="status">
            <option value="active" <?php echo set_select('status', 'active', $category['status'] === 'active'); ?>>Active</option>
            <option value="inactive" <?php echo set_select('status', 'inactive', $category['status'] === 'inactive'); ?>>Inactive</option>
        </select><br>

        <input type="submit" name="submit" value="Update Category">

    <?php echo form_close(); ?>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>
