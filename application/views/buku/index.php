<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
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
    <h1>Book List</h1>
    <form action="<?php echo site_url('buku'); ?>" method="get">
        <input type="text" name="search" placeholder="Search Books" value="<?php echo $search; ?>" />
        <input type="submit" value="Search" />
    </form>
    <a href="<?php echo site_url('buku/create'); ?>">Add New Book</a>
    <table>
        <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buku as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['author']; ?></td>
            <td><?php echo $item['publisher']; ?></td>
            <td><?php echo $item['category_name']; ?></td>
            <td><?php echo number_format($item['price'], 2); ?></td>
            <td><?php echo $item['stock']; ?></td>
            <td>
                <a href="<?php echo site_url('buku/view/'.$item['id']); ?>">View</a> |
                <a href="<?php echo site_url('buku/edit/'.$item['id']); ?>">Edit</a> |
                <a href="<?php echo site_url('buku/delete/'.$item['id']); ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $pagination; ?>

</body>
</html>
