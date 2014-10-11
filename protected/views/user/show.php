<style>
    table {
        width: 85%;
        border: 1px blue solid;
        border-collapse: 0;
        border-spacing: 0;
    }

    table td {
        border: 1px gray solid;
    }
</style>
<h2>user表信息</h2>
<table>
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
