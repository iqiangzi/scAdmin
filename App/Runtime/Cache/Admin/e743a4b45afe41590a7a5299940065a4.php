<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageContent">
        <form action="<?php echo U('Menu/add');?>" data-toggle="ajaxform" data-reload-navtab="true">
            <p><label class="x85">上级菜单：</label><input type="text" id="sc-menuText" value="<?php echo ($info["ptitle"]); ?>" data-toggle="selectztree" size="18" data-tree="#sc-menuTree" placeholder="不填写为顶级菜单" readonly>
                <input type="hidden" name="pid" value="<?php echo ($info["pid"]); ?>">
                <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                <ul id="sc-menuTree" class="ztree hide" data-toggle="ztree" data-on-click="sc_NodeClick">
                    <?php if(is_array($menuList)): foreach($menuList as $key=>$v): ?><li data-id="<?php echo ($v["id"]); ?>" data-pid="<?php echo ($v["pid"]); ?>"><?php echo ($v["title"]); ?></li><?php endforeach; endif; ?>
                </ul>
            </p>
            <p><label class="x85">标题：</label><input type="text" name="title" value="<?php echo ($info["title"]); ?>"></p>
            <p><label class="x85">名称：</label><input type="text" name="name" value="<?php echo ($info["name"]); ?>"></p>
            <p><label class="x85">图标：</label><input type="text" name="icon" value="<?php echo ($info["icon"]); ?>" placeholder="Font Awesome图标,不加fa-"></p>
            <p><label class="x85">排序：</label><input type="text" name="sort" value="<?php echo ($info["sort"]); ?>" data-toggle="spinner" size="5"></p>
            <p><label class="x85">状态：</label>
                <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" <?php if($info["status"] == 1): ?>checked<?php endif; ?> >
                &nbsp;
                <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭" <?php if($info["status"] == 0): ?>checked<?php endif; ?> >
            </p>
            <br>

            <label class="x85"></label><button type="submit" class="btn btn-green" data-icon="edit">更新</button>
        </form>
</div>
<script>
//单击事件
function sc_NodeClick(e, treeId, treeNode) {
    $('#sc-menuText').val(treeNode.name);
    $('input[name="pid"]').val(treeNode.id);
}
</script>