        <div id="tab-add-your-comment" style="display: none">
            發表評論時請記住以下幾點：
            <ul>
            <li><div>你的評論必須是中文否則可能會被移除。</div></li>
            <li><div>不知道如何發表？看看我們的<a href="?help=commenting-and-you" target="_blank">指南</a>！</div></li>
            <li><div>請發表你的疑問在我們的<a href="?forums">論壇</a> 以獲得更快的答復。</div></li>
            <li><div>你在發表前最好先預覽下你的評論。</div></li>
            </ul>
<?php
    echo $this->coError ? '            <div class="msg-failure">'.$this->coError."</div>\n            <div class=\"pad\"></div>\n" : '';

    if (User::canComment()):
?>
            <form name="addcomment" action="?comment=add&amp;type=<?php echo $this->type.'&amp;typeid='.$this->typeId; ?>" method="post" onsubmit="return co_validateForm(this)">
                <div id="funcbox-generic"></div>
                <script type="text/javascript">Listview.funcBox.coEditAppend($('#funcbox-generic'), {body: ''}, 1)</script>
                <div class="pad"></div>
                <input type="submit" value="Submit"></input>
<?php
    else:
?>
            <form action="/" method="post">
            <div class="comment-edit-body"><textarea class="comment-editbox" rows="10" cols="40" name="commentbody" disabled="disabled"></textarea></div>
<?php
    endif;
    if (!User::$id):
?>
            <small>你尚未登錄，請先<a href="?account=signin">登錄</a>或<a href="?account=signup">注冊一個賬號</a> 以發表你的評論。</small>
<?php
    endif;
?>
            </form>
        </div>
        <div id="tab-submit-a-screenshot" style="display: none">
            你的截圖最好是如下幾種情形：
            <ul>
            <li><div>游戲內截圖比模型查看器生成的更優先。</div></li>
            <li><div>越高的質量越好！</div></li>
            <li><div>請閱讀我們的<a href="?help=screenshots-tips-tricks" target="_blank">提示和技巧</a>假如你還沒看過的話。</div></li>
            </ul>
<?php
    echo $this->ssError ? '            <div class="msg-failure">'.$this->ssError."</div>\n            <div class=\"pad\"></div>\n" : '';

    if (User::canUploadScreenshot()):
?>
            <form action="?screenshot=add&<?php echo $this->type.'.'.$this->typeId; ?>" method="post" enctype="multipart/form-data" onsubmit="return ss_validateForm(this)">
            <input type="file" name="screenshotfile" style="width: 35%"/><br />
            <div class="pad2"></div>
            <input type="submit" value="Submit" />
            <div class="pad3"></div>
            <small class="q0">注意：你的截圖將在審查后才會出現在站點上。</small>
<?php
    else:
?>
            <form action="/" method="post">
            <input type="file" name="screenshotfile" disabled="disabled" /><br />
<?php
    endif;
    if (!User::$id):
?>
            <small>你尚未登錄，請先<a href="?account=signin">登錄</a>以提交截圖。</small>
<?php
    endif;
?>
            </form>
        </div>
        <div id="tab-suggest-a-video" style="display: none">
            Simply type the URL of the video in the form below.
<?php
    if (User::canSuggestVideo()):
?>
            <div class="pad2"></div>
            <form action="?video=add&<?php echo $this->type.'.'.$this->typeId; ?>" method="post" enctype="multipart/form-data" onsubmit="return vi_validateForm(this)">
            <input type="text" name="videourl" style="width: 35%" /> <small>Supported: YouTube only</small>
            <div class="pad2"></div>
            <input type="submit" value="Submit" />
            <div class="pad3"></div>
            <small class="q0">Note: Your video will need to be approved before appearing on the site.</small>
<?php
    else:
?>
            <form action="/" method="post">
            <input type="text" name="videourl" disabled="disabled" /><br />
<?php
    endif;
    if (!User::$id):
?>
            <small>You are not signed in. Please <a href="?account=signin">sign in</a> to submit a video.</small>
<?php
    endif;
?>
            </form>
        </div>
