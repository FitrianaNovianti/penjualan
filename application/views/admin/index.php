<!DOCTYPE html>
<html>
<head>
    <title>Admin List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Admin List</h1>
    <a href="<?php echo site_url('admin/create'); ?>" class="button">Add Admin</a>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo $admin['username']; ?></td>
                <td><?php echo $admin['nama']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td><?php echo $admin['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
