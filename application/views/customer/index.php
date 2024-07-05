<!DOCTYPE html>
<html>
<head>
    <title>Customer List</title>
</head>
<body>
    <h1>Customer List</h1>
    <a href="<?php echo site_url('customer/create'); ?>">Add New Customer</a>
    <table Border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['id']; ?></td>
                <td><?php echo $customer['nama']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['alamat']; ?></td>
                <td><?php echo $customer['telepon']; ?></td>
                <td>
                    <a href="<?php echo site_url('customer/view/'.$customer['id']); ?>">View</a> |
                    <a href="<?php echo site_url('customer/edit/'.$customer['id']); ?>">Edit</a> |
                    <a href="<?php echo site_url('customer/delete/'.$customer['id']); ?>" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
