<?php
include_once "config.php";
include_once 'includes/header.php';


// 查询留言
$zhanlan = $connect->query("SELECT * FROM fanall WHERE age = 1 ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      展览板 - <?php echo $config[ 'title'] ?>
        </title>
    <link rel="stylesheet" href="../public/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .SY_wrapper {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .megList {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
        .mTop {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .user, .time {
            font-size: 14px;
            color: #666;
        }
        .mContent {
            font-size: 16px;
            color: #333;
        }
        .submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="SY_wrapper">
        <div class="megAdd">
            <button type="button" class="submit" onclick="window.location.href='./'">返回首页</button>
        </div>
        <?php 
        if (mysqli_num_rows($zhanlan) > 0) { 
            while($row = mysqli_fetch_assoc($zhanlan)) { 
                echo '<div class="megList">
                        <div class="mTop">
                            <span class="user">';
                if ($row['name_id'] == 1) {
                    echo htmlspecialchars($row['name']);
                } else {
                    echo '匿名留言';
                }
                echo '</span>
                            <span class="time">(' . htmlspecialchars($row["time"]) . ')</span>
                        </div>
                        <div class="mContent">
                            <div>' . nl2br(htmlspecialchars($row["text"], ENT_QUOTES, 'UTF-8')) . '</div>
                        </div>
                    </div>'; 
            } 
        } else { 
            echo '<p>没有留言。</p>'; 
        } 
        ?> 
    </div>
</body>
</html>