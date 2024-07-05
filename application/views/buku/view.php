<!DOCTYPE html>
<html>
<head>
    <title>View Book</title>
</head>
<body>
    <h1>Book Details</h1>
    <p><strong>Title:</strong> <?php echo $buku['title']; ?></p>
    <p><strong>Author:</strong> <?php echo $buku['author']; ?></p>
    <p><strong>Publisher:</strong> <?php echo $buku['publisher']; ?></p>
    <p><strong>Category:</strong> <?php echo $buku['category_name']; ?></p>
    <p><strong>Price:</strong> <?php echo number_format($buku['price'], 2); ?></p>
    <p><strong>Stock:</strong> <?php echo $buku['stock']; ?></p>
    <p><a href="<?php echo site_url('buku'); ?>">Back to List</a></p>
</body>
</html>
