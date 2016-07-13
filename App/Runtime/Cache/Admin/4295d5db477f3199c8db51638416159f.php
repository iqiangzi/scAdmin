<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="/index.php/Admin/User/index.html?_=1468415376957" method="get">
        <input type="hidden" name="pageSize" value="${model.pageSize}">
        <input type="hidden" name="pageCurrent" value="${model.pageCurrent}">
        <label>用户名/昵称：</label><input type="text" value="" name="name" class="form-control" size="15">&nbsp;    
        
        <button type="submit" class="btn-default" data-icon="search">查询</button>&nbsp;
        <button type="button" class="btn btn-orange" data-icon="undo" onclick="$(this).navtab('refresh');" >刷新</button>&nbsp;
        <button type="button" class="btn btn-green pull-right" data-icon="plus" data-toggle="dialog"
        data-options="{id:'sc-addUser', url:'<?php echo U('User/add');?>', title:'添加菜单', height:360}">添加</button>
    </form>
</div>

<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%" data-nowrap="true">
        <thead>
            <tr>
                <th width="30">ID</th>
                <th>用户名</th>
                <th>昵称/姓名</th>
                <th>上次登陆时间</th>
                <th>上次登陆IP</th>
                <th>邮箱</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>状态</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($userList)): foreach($userList as $key=>$v): ?><tr data-id="<?php echo ($v["id"]); ?>">
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo ($v["nickname"]); ?></td>
                <td><?php echo ($v["last_login_time"]); ?></td>
                <td><?php echo ($v["last_login_ip"]); ?></td>
                <td><?php echo ($v["email"]); ?></td>
                <td><?php echo ($v["create_time"]); ?></td>
                <td><?php echo ($v["update_time"]); ?></td>
                <td><?php echo (showStatus($v["status"])); ?></td>
                <td>
                    <button type="button" class="btn btn-green" data-toggle="dialog" data-options="{id:'sc-editMenu<?php echo ($v["id"]); ?>', url:'<?php echo U('Menu/edit');?>?id=<?php echo ($v["id"]); ?>', title:'编辑菜单'}">编辑</button>
                    <a href="<?php echo U('Menu/del');?>?id=<?php echo ($v["id"]); ?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗？">删</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>

<div class="bjui-pageFooter">
    <div class="pages">
        <span>每页&nbsp;</span>
        <div class="selectPagesize">
            <select data-toggle="selectpicker" data-toggle-change="changepagesize">
                <option value="30">30</option>
                <option value="60">60</option>
                <option value="120">120</option>
                <option value="150">150</option>
            </select>
        </div>
        <span>&nbsp;条，共 <?php echo ($userCount); ?> 条</span>
    </div>
    <div class="pagination-box" data-toggle="pagination" data-total="<?php echo ($userCount); ?>" data-page-size="30" data-page-current="1">
    </div>
</div>