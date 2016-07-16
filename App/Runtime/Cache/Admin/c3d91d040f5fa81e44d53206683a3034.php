<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">

    //选择事件
    function S_NodeCheck(e, treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj(treeId),
            nodes = zTree.getCheckedNodes(true)
        var ids = '', names = ''
        
        for (var i = 0; i < nodes.length; i++) {
            ids   += ','+ nodes[i].id
            names += ','+ nodes[i].name
        }
        if (ids.length > 0) {
            ids = ids.substr(1), names = names.substr(1)
        }
        
        var $from = $('#'+ treeId).data('fromObj')

        if ($from && $from.length) {
            $from.val(names)
            $('#rules').val(ids)
        }
    }
    //单击事件
    function S_NodeClick(event, treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj(treeId)
        
        zTree.checkNode(treeNode, !treeNode.checked, true, true)
        
        event.preventDefault()
    }
    


</script>
<div class="bjui-pageContent">
        <form action="<?php echo U('AuthGroup/add');?>" data-toggle="ajaxform" data-reload-navtab="true">
            <p><label class="x85">标题：</label><input type="text" name="title" value="<?php echo ($info["title"]); ?>"></p>
            <p><label class="x85">用户权限：</label><input type="text" name="menus" id="sc_roles_edit" data-toggle="selectztree" size="18" data-tree="#sc_roles_tree_edit" readonly>
            <input type="hidden" name="rules" id="rules" value="<?php echo ($info["rules"]); ?>">
            <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                <ul id="sc_roles_tree_edit" class="ztree hide" data-toggle="ztree" data-expand-all="false" data-check-enable="true" data-on-check="S_NodeCheck" data-on-click="S_NodeClick">
                    <?php if(is_array($catList)): foreach($catList as $key=>$v): ?><li data-id="<?php echo ($v["id"]); ?>" data-pid="<?php echo ($v["pid"]); ?>" data-faicon="<?php echo ($v["icon"]); ?>" <?php if(in_array($v['id'], explode(',', $info['rules']))): ?>data-checked="true"<?php endif; ?>><?php echo ($v["title"]); ?></li><?php endforeach; endif; ?>
                </ul>
            </p>
            <p>
                <label class="x85">备注：</label><textarea name="remark" data-toggle="autoheight" cols="30"><?php echo ($info["remark"]); ?></textarea>
            </p>
            <p><label class="x85">排序：</label><input type="text" name="sort" value="<?php echo ($info["sort"]); ?>" data-toggle="spinner" size="5"></p>
            <p><label class="x85">状态：</label>
                <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" 
                <?php if($info["status"] == 1): ?>checked<?php endif; ?>>
                &nbsp;
                <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭"
                <?php if($info["status"] == 0): ?>checked<?php endif; ?>>
            </p>
        </form>
</div>

<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close" data-icon="close">取消</button></li>
        <li><button type="submit" class="btn-default" data-icon="save">保存</button></li>
    </ul>
</div>