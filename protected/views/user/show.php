
<h2>user表信息</h2>
<table class="table table-hover">
    <?php
    foreach ($user_infos as $_v) {
        ?>
        <tr>
            <td>用户名</td>
            <td><?php echo $_v->user_name; ?></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><?php echo $_v->password; ?></td>
        </tr>
    <?php } ?>
</table>
