
function checkForUpdates() {
    const apiUrl = 'https://gitee.com/api/v5/repos/wangxinqq/forgetting-message-box/releases/latest';

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('网络请求失败');
            }
            return response.json();
        })
        .then(data => {
            const latestVersion = data.tag_name; 
            const assets = data.assets || [];
            let updateUrl = ''; 

            
            if (assets.length > 0) {
                updateUrl = assets[0].browser_download_url; 
            }

            
            if (versionCompare(latestVersion, currentVersion) > 0) {
                // 有新版本可用
                alert(`检测到新版本：${latestVersion}\n当前版本：${currentVersion}\n建议尽快更新！`);
                document.getElementById('latest-version').textContent = latestVersion;
                document.getElementById('update-url').href = updateUrl;
                document.getElementById('update-url').style.display = 'block';
            } else {
                // 当前版本已是最新
                document.getElementById('latest-version').textContent = latestVersion;
            }
        })
        .catch(error => {
            console.error('检查更新失败：', error);
            alert('检查更新失败，请稍后重试或检查网络连接。');
        });
}

// 版本号比较函数
function versionCompare(v1, v2) {
    const v1Parts = v1.split('.').map(Number);
    const v2Parts = v2.split('.').map(Number);

    for (let i = 0; i < Math.max(v1Parts.length, v2Parts.length); i++) {
        const num1 = v1Parts[i] || 0;
        const num2 = v2Parts[i] || 0;

        if (num1 > num2) return 1;
        if (num1 < num2) return -1;
    }

    return 0;
}


window.onload = function() {
    checkForUpdates();
};