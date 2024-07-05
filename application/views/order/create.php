<!DOCTYPE html>
<html>
<head>
    <title>Add New Order</title>
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
    <h1>Add New Order</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('order/create'); ?>
        <label for="customer_id">Customer</label>
        <select name="customer_id">
            <?php foreach ($customers as $customer): ?>
            <option value="<?php echo $customer['id']; ?>" <?php echo set_select('customer_id', $customer['id']); ?>>
                <?php echo $customer['nama']; ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label for="order_date">Order Date</label>
        <input type="datetime-local" name="order_date" value="<?php echo set_value('order_date'); ?>" />

        <label for="status">Status</label>
        <select name="status">
            <option value="pending" <?php echo set_select('status', 'pending'); ?>>Pending</option>
            <option value="completed" <?php echo set_select('status', 'completed'); ?>>Completed</option>
            <option value="cancelled" <?php echo set_select('status', 'cancelled'); ?>>Cancelled</option>
        </select>

        <label for="total">Total</label>
        <input type="text" name="total" value="<?php echo set_value('total'); ?>" />

        <input type="submit" class="button" value="Add Order" />
    </form>
    <p><a href="<?php echo site_url('order'); ?>">Back to List</a></p>
</body>
</html>
