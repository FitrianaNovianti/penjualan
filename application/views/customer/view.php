<!DOCTYPE html>
<html>
<head>
    <title>View Customer</title>
</head>
<body>
    <h1>Customer Details</h1>
    <p><strong>ID:</strong> <?php echo $customer['id']; ?></p>
    <p><strong>Nama:</strong> <?php echo $customer['nama']; ?></p>
    <p><strong>Email:</strong> <?php echo $customer['email']; ?></p>
    <p><strong>Alamat:</strong> <?php echo $customer['alamat']; ?></p>
    <p><strong>Telepon:</strong> <?php echo $customer['telepon']; ?></p>
    <p><a href="<?php echo site_url('customer/edit/'.$customer['id']); ?>">Edit</a> | <a href="<?php echo site_url('customer'); ?>">Back to List</a></p>
</body>
</html>
