<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title']; ?></title>
    <link href="../templates/pink/css/app.64567ff6.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../templates/pink/css/gtmc-data-report.067eaaac.css">
    <link rel="stylesheet" type="text/css" href="../templates/pink/css/bb.css">
    <link rel="stylesheet" type="text/css" href="../templates/pink/css/main.css">
    <style>
        .header {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
        .imglogo img {
            max-width: 100px;
        }
        .content-main {
            padding: 20px;
        }
        .btn {
            margin-top: 20px;
        }
        .modal-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="app" class="page-warpper">
        <div class="header">
            <div class="van-row van-row--flex van-row--align-center">
                <div class="van-col van-col--8">
                    <div class="van-image imglogo">
                        <a href="index.php">
                            <img src="<?php echo $config['logo']; ?>" class="van-image__img">
                        </a>
                    </div>
                </div>
                <div class="van-col van-col--15">
                    <span style="color: #b17e94; font-size: 15px; position: relative; top: -13px; float: left;">
                        想说的话请寄存在我这 <?php echo $config['title']; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="content-main">
            <form action="fk.php" method="post" name="tijiao" onsubmit="return check()">
                <div class="van-cell van-field">
                    <div class="van-cell__title van-field__label"><span style="color: rgb(0, 0, 0); font-size: 14px;">好友名字</span></div>
                    <div class="van-cell__value van-field__value">
                        <div class="van-field__body">
                            <input type="text" name="name" lay-verify="required" required placeholder="输入你的名字" class="van-field__control">
                            <div class="van-field__right-icon">
                                <i class="van-icon van-icon-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="van-cell van-field borderNome">
                    <div class="van-cell__title van-field__label"><span style="color: rgb(0, 0, 0); font-size: 14px;">留言内容</span></div>
                    <div class="van-cell__value van-field__value">
                        <div class="van-field__body">
                            <textarea rows="4" name="text" id="content" oninput="countChars()" required="" lay-verify="required" placeholder="把你想说的话或者小秘密都留在这里吧" class="van-field__control" style="height: 113px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="anony-and-count">
                    <p>字数：<span name="charCount" id="charCount">0</span> - 1000</p>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#settingsModal">
                        留言设置
                    </button>
                </div>
                <div class="btn">
                    <button type="submit" class="van-button van-button--info van-button--normal van-button--block">
                        <span class="van-button__text">提交留言</span>
                    </button>
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
    </div>

    
    <script src="../public/js/jquery-3.6.0.min.js"></script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
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