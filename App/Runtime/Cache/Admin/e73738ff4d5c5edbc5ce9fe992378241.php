<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageContent">
        <form action="/index.php/Admin/User/add.html?_=1468415376961" data-toggle="ajaxform" data-reload-navtab="true">
            <p><label class="x85">用户组：</label><select name="groupId" data-toggle="selectpicker">
                    <?php if(is_array($menuList)): foreach($menuList as $key=>$v): ?><option value="">全部</option><?php endforeach; endif; ?>
                </select>
            </p>
            <p><label class="x85">用户名：</label><input type="text" name="title"></p>
            <p><label class="x85">昵称/姓名：</label><input type="text" name="name"></p>
            <p><label class="x85">邮箱：</label><input type="text" name="icon"  placeholder="Font Awesome图标,不加fa-"></p>
            <p><label class="x85">手机：</label><input type="text" name="icon"></p>
            <p><label class="x85">状态：</label>
                <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" checked>
                &nbsp;
                <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭">
            </p>
            <p>
                <label class="x85">备注：</label>
                <textarea name="remark" data-toggle="autoheight" ></textarea>
            </p>
            
        </form>
</div>

<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close" data-icon="close">取消</button></li>
        <li><button type="submit" class="btn-default" data-icon="save">保存</button></li>
    </ul>
</div>