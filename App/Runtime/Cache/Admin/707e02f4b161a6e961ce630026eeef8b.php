<?php if (!defined('THINK_PATH')) exit();?><script>
//单击事件
function sc_NodeClick(e, treeId, treeNode) {
    $('#sc-menuText').val(treeNode.name);
    $('input[name="pid"]').val(treeNode.id);
}
</script>
<div class="bjui-pageContent">
        <form action="/index.php/Admin/Menu/add.html?_=1468320653038" data-toggle="ajaxform" data-reload-navtab="true">
            <p><label class="x85">上级菜单：</label><input type="text" id="sc-menuText" data-toggle="selectztree" size="18" data-tree="#sc-menuTree" placeholder="不填写为顶级菜单" readonly>
                <input type="hidden" name="pid" value="0">
                <ul id="sc-menuTree" class="ztree hide" data-toggle="ztree" data-on-click="sc_NodeClick">
                    <?php if(is_array($menuList)): foreach($menuList as $key=>$v): ?><li data-id="<?php echo ($v["id"]); ?>" data-pid="<?php echo ($v["pid"]); ?>"><?php echo ($v["title"]); ?></li><?php endforeach; endif; ?>
                </ul>
            </p>
            <p><label class="x85">标题：</label><input type="text" name="title"></p>
            <p><label class="x85">名称：</label><input type="text" name="name"></p>
            <p><label class="x85">图标：</label><input type="text" name="icon"  placeholder="Font Awesome图标,不加fa-"></p>
            <p><label class="x85">排序：</label><input type="text" name="sort" value="0" data-toggle="spinner" size="5"></p>
            <p><label class="x85">状态：</label>
                <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" checked>
                &nbsp;
                <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭">
            </p>
            <br>
            <label class="x85"></label><button type="submit" class="btn btn-green" data-icon="plus">添加</button>
        </form>
</div>