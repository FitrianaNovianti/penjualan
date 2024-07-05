<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
</head>
<body>
    <h1>Add New Book</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('buku/create'); ?>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo set_value('title'); ?>" /><br />

        <label for="author">Author</label>
        <input type="text" name="author" value="<?php echo set_value('author'); ?>" /><br />

        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" value="<?php echo set_value('publisher'); ?>" /><br />

        <label for="category">Category</label>
        <select name="category">
            <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat['id']; ?>" <?php echo set_select('category', $cat['id']); ?>>
                <?php echo $cat['name']; ?>
            </option>
            <?php endforeach; ?>
        </select><br />

        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo set_value('price'); ?>" /><br />

        <label for="stock">Stock</label>
        <input type="text" name="stock" value="<?php echo set_value('stock'); ?>" /><br />

        <input type="submit" value="Add Book" />
    </form>
    <p><a href="<?php echo site_url('buku'); ?>">Back to List</a></p>
</body>
</html>
