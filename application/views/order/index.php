<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>Order List</h1>
    <form action="<?php echo site_url('order'); ?>" method="get">
        <input type="text" name="search" placeholder="Search Orders" value="<?php echo $search; ?>" />
        <input type="submit" value="Search" />
    </form>
    <a href="<?php echo site_url('order/create'); ?>">Add New Order</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['customer_name']; ?></td>
                <td><?php echo $item['order_date']; ?></td>
                <td><?php echo ucfirst($item['status']); ?></td>
                <td><?php echo number_format($item['total'], 2); ?></td>
                <td>
                    <a href="<?php echo site_url('order/view/'.$item['id']); ?>">View</a> |
                    <a href="<?php echo site_url('order/edit/'.$item['id']); ?>">Edit</a> |
                    <a href="<?php echo site_url('order/delete/'.$item['id']); ?>" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php echo $pagination; ?>

</body>
</html>
