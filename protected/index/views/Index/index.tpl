{extends file='../../../main/views/main.tpl'} {block name=body}

<div style="text-align: center">
    <h1>歡迎進入OSS系統</h1>
</div>
<br>
<div style="text-align: center; width: 600px; margin: 0 auto">
    <table align="center" border="0" style="width: 400px; margin: 0 auto">
        <tr>
            <td align="right"><h3>您的帳號：</h3></td>
            <td align="left"><font>{$uid}</font></td>
        </tr>
        <tr>
            <td align="right"><h3>本次登錄IP：</h3></td>
            <td align="left"><font></font></td>
        </tr>
        <tr>
            <td align="right"><h3>上次登錄IP：</h3></td>
            <td align="left"><font></font></td>
        </tr>
        <tr>
            <td align="right"><h3>上次登錄時間：</h3></td>
            <td align="left"><font></font></td>
        </tr>
    </table>
</div>
{/block}