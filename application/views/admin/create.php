<!DOCTYPE html>
<html>
<head>
    <title>Add Admin</title>
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
    <h1>Add Admin</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/create'); ?>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>" />

        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" />

        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" />

        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" />

        <label for="status">Status</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <input type="submit" class="button" value="Add Admin" />
    </form>
    <p><a href="<?php echo site_url('admin'); ?>">Back to Admin List</a></p>
</body>
</html>
