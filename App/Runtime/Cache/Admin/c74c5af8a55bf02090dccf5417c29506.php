<?php if (!defined('THINK_PATH')) exit();?><div class="bjui-pageContent">
        <form action="/index.php/Admin/User/auth.html?id=6&amp;_=1468679492742" method="post" data-toggle="ajaxform">
        <table data-toggle="tablefixed" class="table" data-width="100%" data-nowrap="true">
            <tbody>
                <input type="hidden" name="uid" value="<?php echo ($uid); ?>">
                <tr>
                    <?php if(is_array($ruleGroupList)): foreach($ruleGroupList as $key=>$v): ?><td><input type="checkbox" name="group_id[]" value="<?php echo ($v["id"]); ?>" data-toggle="icheck" data-label="<?php echo ($v["title"]); ?>"
                        <?php if(in_array($v['id'], $authArr)): ?>checked<?php endif; ?> ></td>
                        <?php if(($key+1) % 4 == 0): ?></tr><tr><?php endif; endforeach; endif; ?>
                </tr>
            </tbody>
        </table>
        </form>
</div>

<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close" data-icon="close">取消</button></li>
        <li><button type="submit" class="btn-default" data-icon="save">保存</button></li>
    </ul>
</div>