<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="/index.php/Admin/Roles/index.html?_=1468571147873" method="post">
        <label>用户组标题：</label><input type="text" value="<?php echo ($name); ?>" name="name" class="form-control" size="15">&nbsp;   
        <button type="submit" class="btn-default" data-icon="search">查询</button>&nbsp;
        <button type="button" class="btn btn-orange" data-icon="undo" onclick="$(this).navtab('refresh');" >刷新</button>
        &nbsp;
        <button type="button" class="btn btn-green pull-right" data-icon="plus" data-toggle="dialog"
        data-options="{id:'sc-addRoles', url:'<?php echo U('Roles/add');?>', title:'添加菜单'}">添加</button>
    </form>
</div>

<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%" data-nowrap="true">
        <thead>
            <tr>
                <th width="30">ID</th>
                <th>用户组标题</th>
                <th>状态</th>
                <th>排序</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($rolesList)): foreach($rolesList as $key=>$v): ?><tr data-id="<?php echo ($v["id"]); ?>">
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo (showStatus($v["status"])); ?></td>
                <td><?php echo ($v["sort"]); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$v["create_time"])); ?></td>
                <td><?php echo (date('Y-m-d H:i:s',$v["update_time"])); ?></td>
                <td>
                    <button type="button" class="btn btn-green" data-toggle="dialog" data-options="{id:'sc-editRoles<?php echo ($v["id"]); ?>', url:'<?php echo U('Roles/edit');?>?id=<?php echo ($v["id"]); ?>', title:'编辑菜单'}">编辑</button>
                    <a href="<?php echo U('Roles/del');?>?id=<?php echo ($v["id"]); ?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗？">删</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>