<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin</title>
</head>
<body>
    <h1>Edit Admin</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/edit/'.$admin['id']); ?>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo set_value('username', $admin['username']); ?>" /><br />

        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo set_value('nama', $admin['nama']); ?>" /><br />

        <label for="password">Password (Kosongkan jika tidak ingin diubah)</label>
        <input type="password" name="password" /><br />

        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo set_value('email', $admin['email']); ?>" /><br />

        <label for="status">Status</label>
        <select name="status">
            <option value="active" <?php echo set_select('status', 'active', $admin['status'] === 'active'); ?>>Active</option>
            <option value="inactive" <?php echo set_select('status', 'inactive', $admin['status'] === 'inactive'); ?>>Inactive</option>
        </select><br />

        <input type="submit" name="submit" value="Update Admin" />
    </form>
    <p><a href="<?php echo site_url('admin'); ?>">Back to List</a></p>
</body>
</html>
