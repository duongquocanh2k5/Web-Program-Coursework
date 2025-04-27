<h2>Delete Module</h2>
<form action="deletemodule.php" method="post">
    <div>
        <label for="module">Select Module to Delete:</label>
        <select name="id" id="module" required>
            <option value="">Choose Module</option>
            <?php foreach ($modules as $module): ?>
                <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit" name="delete_module" onclick="return confirm('Are you sure you want to delete this module?')">Delete Module</button>
    </div>
</form>