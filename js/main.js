/**
 * Created with IntelliJ IDEA.
 * User: Administrator
 * Date: 14-10-14
 * Time: 下午2:26
 * To change this template use File | Settings | File Templates.
 */
//主导航状态样式
function topMenu() {
    if ($.cookie("topMenu") != null) {
        $('#' + $.cookie("topMenu")).addClass('active');
    } else {
        $('#menu li').eq(0).addClass('active');
    }
    $('#menu li').live('click', function () {
        $.cookie('secondMenu', null);//清空二级菜单cookie
        $.cookie('topMenu', $(this).attr('id'));
    });
}
//二级导航
function loadSecondMenus(secondMenusData) {

    $('#secondMenus').tree({
        animate: true,
        lines: false,
        data: secondMenusData,
        formatter: function (node) {   //控制字体输出格式
            var s = node.text;
            if (node.level == 1) {
                s = '<span style="font-weight: bold;">' + node.text + '</span>';
            }
            return s;
        },
        onLoadSuccess: function (node, data) {
            //默认选中第一个节点
            if ($.cookie('secondMenu') == null) {
               // $(this).tree('select', $(this).tree('getRoot').target);
                if($(this).tree('getRoot').children){
                    $('#'+$(this).tree('getRoot').children[0].domId).addClass('tree-node-selected');
                }else{
                    $('#'+$(this).tree('getRoot').domId).addClass('tree-node-selected');
                }
            } else {
                var node = $(this).tree('find', $.cookie('secondMenu'));
                //$(this).tree('select', node.target);
                $('#'+node.domId).addClass('tree-node-selected');
            }
        },
        onBeforeSelect: function (node) {
            if ($(this).tree('isLeaf',node.target) == false)     //非叶子节点不可选
                return false;
        },
        onSelect: function (node) {
            $.cookie('secondMenu', node.id);
            location.href = node.url;
        }
    })

}
/*修改密码*/
function modPsw(){
    $('#modPsw').live('click',function(){
        $('#mofPswWin').window('open');
        $('#modPswForm').form('clear');
    })
}
