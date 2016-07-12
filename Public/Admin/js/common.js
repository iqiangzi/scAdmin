/*$(document).ready(function() {
	//添加事件
	$(document).on('click', '.sc-submit', function() {
		var url = $(this).attr('sc-url'),
			data = $(this).parent('.sc-form').serialize();

		$.post(url, data, function(r) {
			if (r.status == 0) {
				BJUI.alertmsg('warn', r.msg);
			} else {
				BJUI.alertmsg('ok', r.msg);
				close('sc-editMenu4');
				$(this).navtab('refresh');
			}
		},'json');

	});

});
*/
