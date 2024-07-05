<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>
    <h1>Create Customer</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('customer/create'); ?>
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" /><br />

        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" /><br />

        <label for="alamat">Alamat</label>
        <textarea name="alamat"><?php echo set_value('alamat'); ?></textarea><br />

        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" value="<?php echo set_value('telepon'); ?>" /><br />

        <input type="submit" name="submit" value="Create Customer" />
    </form>
    <p><a href="<?php echo site_url('customer'); ?>">Back to List</a></p>
</body>
</html>
