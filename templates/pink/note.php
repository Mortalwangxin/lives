<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="../templates/pink/css/main.css">
</head>
<body>
    <div class="pink-header">
        <div class="pink-logo">
            <a href="index.php">
                <img src="<?php echo $config['logo']; ?>" alt="Logo">
            </a>
        </div>
        <div class="pink-title"><span style="color: #b17e94; font-size: 15px; position: relative; top: -13px; float: left;">
                        这里的每个故事都是一朵花 
                    </span>
        </div>
    </div>

    <div class="pink-main-content">
        <form action="fk.php" method="post" name="tijiao">
            <div class="pink-form-item">
                <label for="name" class="pink-form-label">好友名字</label>
                <div class="pink-form-input">
                    <input type="text" name="name" required placeholder="输入你的名字">
                </div>
            </div>

            <div class="pink-form-item">
                <label for="message" class="pink-form-label">留言内容</label>
                <div class="pink-form-input">
                    <textarea name="message" id="message" rows="4" required oninput="countChars()" placeholder="把你想说的话或者小秘密都留在这里吧"></textarea>
                </div>
            </div>
            <div class="pink-anony-and-count">
                <p>字数：<span name="charCount" id="charCount">0</span> - 1000</p>
            </div>
            <div>
                <button type="button" class="pink-btn pink-btn-primary" data-toggle="modal" data-target="#settingsModal">
                    留言设置
                </button>
            </div>
            <div>
                <button type="submit" class="pink-btn pink-btn-primary" data-toggle="modal">提交留言</button>
            </div>
            <!-- 隐藏字段，用于存储模态框中的数据 -->
            <input type="hidden" name="notify" value="0">
            <input type="hidden" name="notify-email" value="">
            <input type="hidden" name="age" value="0">
            <input type="hidden" name="name_id" value="0">
        </form>
    </div>
        
    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="settingsModalLabel">留言设置</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>是否需要邮箱通知</label>
                        <input type="checkbox" id="modal-notify" onclick="showEmailInput()">
                    </div>
                    <div id="email-input" style="display:none;">
                        <label>发送邮件到：</label>
                        <input type="email" id="modal-notify-email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>是否在展览板展示</label>
                        <select id="modal-age" class="form-control">
                            <option value="0">不展示</option>
                            <option value="1">展示</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>是否在展览板显示暗号</label>
                        <select id="modal-name_id" class="form-control">
                            <option value="0">不显示</option>
                            <option value="1">显示</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="updateHiddenFields(); $('#settingsModal').modal('hide');">保存设置</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showEmailInput() {
            var notify = document.getElementById('modal-notify');
            var emailInput = document.getElementById('email-input');
            if (notify.checked) {
                emailInput.style.display = 'block';
            } else {
                emailInput.style.display = 'none';
            }
        }

        function updateHiddenFields() {
            var notify = document.getElementById('modal-notify').checked ? 1 : 0;
            var notifyEmail = document.getElementById('modal-notify-email').value;
            var age = document.getElementById('modal-age').value;
            var name_id = document.getElementById('modal-name_id').value;

            document.querySelector('input[name="notify"]').value = notify;
            document.querySelector('input[name="notify-email"]').value = notifyEmail;
            document.querySelector('input[name="age"]').value = age;
            document.querySelector('input[name="name_id"]').value = name_id;

            $('.modal-backdrop').remove();
        }

        // 初始化时调用一次，确保隐藏字段的值与模态框中的默认值一致
        updateHiddenFields();
    </script>
</body>
</html>