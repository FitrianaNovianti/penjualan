<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('customer/edit/'.$customer['id']); ?>
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo set_value('nama', $customer['nama']); ?>" /><br />

        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo set_value('email', $customer['email']); ?>" /><br />

        <label for="alamat">Alamat</label>
        <textarea name="alamat"><?php echo set_value('alamat', $customer['alamat']); ?></textarea><br />

        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" value="<?php echo set_value('telepon', $customer['telepon']); ?>" /><br />

        <input type="submit" name="submit" value="Update Customer" />
    </form>
    <p><a href="<?php echo site_url('customer'); ?>">Back to List</a></p>
</body>
</html>
