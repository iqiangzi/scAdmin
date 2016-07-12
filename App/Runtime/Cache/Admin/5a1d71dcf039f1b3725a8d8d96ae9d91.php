<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
         
    <button type="button" class="btn btn-green" data-icon="plus" data-toggle="dialog"
    data-options="{id:'sc-addMenu', url:'<?php echo U('Menu/add');?>', title:'添加菜单'}">添加</button>&nbsp;
    <button type="button" class="btn btn-orange" data-icon="undo" onclick="$(this).navtab('refresh');" >刷新</button>
</div>

<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%" data-nowrap="true">
        <thead>
            <tr>
                <th width="30">ID</th>
                <th>菜单标题</th>
                <th>菜单名称</th>
                <th>状态</th>
                <th>排序</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($menuList)): foreach($menuList as $key=>$v): ?><tr data-id="<?php echo ($v["id"]); ?>">
                <td><?php echo ($v["id"]); ?></td>
                <td>&nbsp;
                    <?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['lev']-1);?>
                    <?php if($v["lev"] != 3): ?><i class="glyphicon glyphicon-folder-open"></i>
                    <?php else: ?>
                        <i class="glyphicon glyphicon-file"></i><?php endif; ?>
                    <?php echo ($v["title"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <!-- <td><?php if($v["type"] == 1): ?>后台菜单<?php else: ?>前端导航<?php endif; ?></td> -->
                <td><?php echo (showStatus($v["status"])); ?></td>
                <td><?php echo ($v["sort"]); ?></td>
                <td>
                    <button type="button" class="btn btn-green" data-toggle="dialog" data-options="{id:'sc-editMenu<?php echo ($v["id"]); ?>', url:'<?php echo U('Menu/edit');?>?id=<?php echo ($v["id"]); ?>', title:'编辑菜单'}">编辑</button>
                    <a href="<?php echo U('Menu/del');?>?id=<?php echo ($v["id"]); ?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗？">删</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>