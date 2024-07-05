<!DOCTYPE html>
<html>
<head>
    <title>Edit Order Item</title>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .button {
            margin-top: 10px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Order Item</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('order_item/edit/'.$order_item['id']); ?>
        <label for="buku_id">Buku</label>
        <select name="buku_id">
            <?php foreach ($buku as $item): ?>
            <option value="<?php echo $item['id']; ?>" <?php echo set_select('buku_id', $item['id'], $order_item['buku_id'] == $item['id']); ?>>
                <?php echo $item['title']; ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" value="<?php echo set_value('quantity', $order_item['quantity']); ?>" />

        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo set_value('price', $order_item['price']); ?>" />

        <input type="submit" class="button" value="Update Order Item" />
    </form>
    <p><a href="<?php echo site_url('order/view/'.$order_item['order_id']); ?>">Back to Order Details</a></p>
</body>
</html>
