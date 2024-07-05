<!DOCTYPE html>
<html>
<head>
    <title>View Order</title>
    <style>
        p {
            font-size: 16px;
            margin: 5px 0;
        }
        .back-link {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Order Details</h1>
    <p><strong>ID:</strong> <?php echo $order['id']; ?></p>
    <p><strong>Customer:</strong> <?php echo $order['customer_name']; ?></p>
    <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>
    <p><strong>Status:</strong> <?php echo ucfirst($order['status']); ?></p>
    <p><strong>Total:</strong> <?php echo number_format($order['total'], 2); ?></p>
    <a href="<?php echo site_url('order'); ?>" class="back-link">Back to List</a>

    <h2>Order Items</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Buku</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_items as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['buku_title']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo number_format($item['price'], 2); ?></td>
                <td>
                    <a href="<?php echo site_url('order_item/edit/'.$item['id']); ?>" class="button">Edit</a>
                    <a href="<?php echo site_url('order_item/delete/'.$item['id']); ?>" class="button" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?php echo site_url('order_item/create/'.$order['id']); ?>" class="button">Add Item</a>
    <a href="<?php echo site_url('order'); ?>" class="back-link">Back to List</a>
</body>
</html>
