<?php if (!defined('THINK_PATH')) exit();?><script>
    function pic_upload_success(file, data) {
        var json = $.parseJSON(data)
        
        $(this).bjuiajax('ajaxDone', json)
        if (json[BJUI.keys.statusCode] == BJUI.statusCode.ok) {
            $('#sc_manager_pic').val(json.filename)
            $('#sc_manager_span_pic').html('<img src="'+ json.filename +'" width="100" />')
        }
    }
</script>
<div class="bjui-pageContent">
        <form action="<?php echo U('User/add');?>" method="post" data-toggle="ajaxform" data-reload-navtab="true">
            <table class="table table-condensed table-hover" width="100%">
                <tbody>
                    <!-- <tr>
                        <td>
                            <label class="control-label x85">用户组：</label>
                            <select name="roles_id[]" data-toggle="selectpicker" multiple="true" data-width="200">
                                <?php if(is_array($rolesList)): foreach($rolesList as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(in_array($v['id'], explode(',', $info['roles_id']))): ?>selected<?php endif; ?> ><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </td>
                        <td>
                            <label class="control-label x85">状态：</label>
                            <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" checked>
                            &nbsp;
                            <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭">
                        </td>
                    </tr> -->
                    <tr>
                        <td>
                            <label class="control-label x85">用户名：</label>
                            <input type="text" name="username" value="<?php echo ($info["username"]); ?>">
                        </td>
                        <td>
                            <label class="control-label x85">昵称/姓名：</label>
                            <input type="text" name="nickname" value="<?php echo ($info["nickname"]); ?>">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label x85">密码：</label>
                            <input type="password" name="password" placeholder="********">
                        </td>
                        <td>
                            <label class="control-label x85">确认密码：</label>
                            <input type="password" name="repassword" placeholder="********">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label x85">邮箱：</label>
                            <input type="text" name="email" value="<?php echo ($info["email"]); ?>">
                        </td>
                        <td>
                            <label class="control-label x85">手机：</label>
                            <input type="text" name="mobile" value="<?php echo ($info["mobile"]); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label class="control-label x85">头像：</label>
                            <div style="display: inline-block; vertical-align: middle;">
                                <div id="sc_manager_pic_up" data-toggle="upload" data-uploader="<?php echo U('Image/uploadOne');?>" 
                                    data-file-size-limit="1024000000"
                                    data-file-type-exts="*.jpg;*.jpeg;*.png;*.gif;*.mpg"
                                    data-multi="false"
                                    data-on-upload-success="pic_upload_success"
                                    data-icon="cloud-upload"></div>
                                
                            </div>
                            <input type="hidden" name="avator" value="<?php echo ($info["avator"]); ?>" id="sc_manager_pic">
                            <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                            <span id="sc_manager_span_pic"><img src="<?php if($info['avator']): echo ($info["avator"]); else: ?>/Public/Admin/images/avator.png<?php endif; ?>" alt="头像" width="100" class="img-thumbnail"></span>
                        </td>
                        <td>
                            <label class="control-label x85">状态：</label>
                            <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" checked>
                            &nbsp;
                            <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭">
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <label class="control-label x85">备注：</label>
                            <textarea name="remark" data-toggle="autoheight" cols="30"><?php echo ($info["remark"]); ?></textarea>
                        </td>
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