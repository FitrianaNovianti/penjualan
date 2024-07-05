<!DOCTYPE html>
<html>
<head>
    <title>View Admin</title>
</head>
<body>
    <h1>Admin Details</h1>
    <p><strong>ID:</strong> <?php echo $admin['id']; ?></p>
    <p><strong>Username:</strong> <?php echo $admin['username']; ?></p>
    <p><strong>Nama:</strong> <?php echo $admin['nama']; ?></p>
    <p><strong>Email:</strong> <?php echo $admin['email']; ?></p>
    <p><strong>Status:</strong> <?php echo $admin['status']; ?></p>
    <p><a href="<?php echo site_url('admin/edit/'.$admin['id']); ?>">Edit</a> | <a href="<?php echo site_url('admin'); ?>">Back to List</a></p>
</body>
</html>
