<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
    <label>数据库备份：</label>    
    &nbsp;&nbsp;&nbsp;&nbsp;       
    <button type="button" class="btn-blue" >备份表</button>&nbsp;
    <button type="button" class="btn-green" >优化表</button>&nbsp;
    <button type="button" class="btn-red" >修复表</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-orange" data-icon="undo" onclick="$(this).navtab('refresh');" >刷新</button>&nbsp;
    
    
</div>

<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%" data-nowrap="true">
        <thead>
            <tr>
                <th width="30">No.</th>
                <th width="18"><input type="checkbox" class="checkboxCtrl" data-group="ids[]" data-toggle="icheck" checked></th>
                <th>表名</th>
                <th>数据量</th>
                <th>数据大小</th>
                <th>创建时间</th>
                <th>备份状态</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr data-id="<?php echo ($key+1); ?>">
                <td><?php echo ($key+1); ?></td>
                <td><input type="checkbox" name="ids[]" data-toggle="icheck" value="<?php echo ($v["name"]); ?>" checked></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["rows"]); ?></td>
                <td><?php echo (format_bytes($v["data_length"])); ?></td>
                <td><?php echo ($v["create_time"]); ?></td>
                <td>--</td>
                <td>
                    <button type="button" class="btn btn-green" data-toggle="dialog" data-options="{id:'sc-editUser<?php echo ($v["id"]); ?>', url:'<?php echo U('User/edit');?>?id=<?php echo ($v["id"]); ?>', title:'编辑菜单', width:750, height:400}">优化表</button>
                    <a href="<?php echo U('User/del');?>?id=<?php echo ($v["id"]); ?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗？">修复表</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>