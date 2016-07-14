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
        <form action="/index.php/Admin/User/add.html?_=1468506631997" method="post" data-toggle="ajaxform" data-reload-navtab="true">
            <table class="table table-condensed table-hover" width="100%">
                <tbody>
                    <tr>
                        <td>
                            <label class="control-label x85">用户组：</label>
                            <select name="roles_id[]" data-toggle="selectpicker" multiple="true" data-width="200">
                                <?php if(is_array($rolesList)): foreach($rolesList as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                        </td>
                        <td>
                            <label class="control-label x85">状态：</label>
                            <input type="radio" name="status" value="1" data-toggle="icheck" data-label="开启" checked>
                            &nbsp;
                            <input type="radio" name="status" value="0" data-toggle="icheck" data-label="关闭">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label x85">用户名：</label>
                            <input type="text" name="username">
                        </td>
                        <td>
                            <label class="control-label x85">昵称/姓名：</label>
                            <input type="text" name="nickname">
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label x85">密码：</label>
                            <input type="password" name="password">
                        </td>
                        <td>
                            <label class="control-label x85">确认密码：</label>
                            <input type="password" name="repassword">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label x85">邮箱：</label>
                            <input type="text" name="email">
                        </td>
                        <td>
                            <label class="control-label x85">手机：</label>
                            <input type="text" name="mobile">
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
                            <input type="hidden" name="avator" value="" id="sc_manager_pic">
                            <span id="sc_manager_span_pic"></span>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <label class="control-label x85">备注：</label>
                            <textarea name="remark" data-toggle="autoheight" cols="30"></textarea>
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