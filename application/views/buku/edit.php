<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('buku/edit/'.$buku['id']); ?>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo set_value('title', $buku['title']); ?>" /><br />

        <label for="author">Author</label>
        <input type="text" name="author" value="<?php echo set_value('author', $buku['author']); ?>" /><br />

        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" value="<?php echo set_value('publisher', $buku['publisher']); ?>" /><br />

        <label for="category">Category</label>
        <select name="category">
            <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat['id']; ?>" <?php echo set_select('category', $cat['id'], $buku['category'] == $cat['id']); ?>>
                <?php echo $cat['name']; ?>
            </option>
            <?php endforeach; ?>
        </select><br />

        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo set_value('price', $buku['price']); ?>" /><br />

        <label for="stock">Stock</label>
        <input type="text" name="stock" value="<?php echo set_value('stock', $buku['stock']); ?>" /><br />

        <input type="submit" value="Update Book" />
    </form>
    <p><a href="<?php echo site_url('buku'); ?>">Back to List</a></p>
</body>
</html>
