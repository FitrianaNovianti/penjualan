<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    

    <h1>Category List</h1>
    <a href="<?php echo site_url('category/create'); ?>" class="button">Add New Category</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['description']; ?></td>
                        <td><?php echo $category['status']; ?></td>
                        <td>
                            <a href="<?php echo site_url('category/view/'.$category['id']); ?>">View</a>
                            <a href="<?php echo site_url('category/edit/'.$category['id']); ?>">Edit</a>
                            <a href="<?php echo site_url('category/delete/'.$category['id']); ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No categories found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
