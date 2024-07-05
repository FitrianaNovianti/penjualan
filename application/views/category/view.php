<!DOCTYPE html>
<html>
<head>
    <title>View Category</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <?php $this->load->view('templates/header', array('title' => 'View Category')); ?>

    <h1>View Category</h1>

    <table>
        <tr>
            <th>Name</th>
            <td><?php echo $category['name']; ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $category['description']; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $category['status']; ?></td>
        </tr>
    </table>

    <p>
        <a href="<?php echo site_url('category/edit/'.$category['id']); ?>" class="button">Edit</a> |
        <a href="<?php echo site_url('category/delete/'.$category['id']); ?>" onclick="return confirm('Are you sure you want to delete this category?');" class="button">Delete</a>
    </p>

    <?php $this->load->view('templates/footer'); ?>
</body>
</html>
