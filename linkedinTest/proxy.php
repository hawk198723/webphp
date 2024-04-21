<?php
// 定义LinkedIn API的URL
define('LINKEDIN_API_URL', 'https://api.linkedin.com/v2/ugcPosts');

// 设置CORS头部
// header("Access-Control-Allow-Origin: https://www.jasonxw.com");  // 确保这是你的前端应用的实际来源
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Restli-Protocol-Version");
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');  
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}"); 
// 检查是否为预检请求
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // 如果是预检请求，发送200响应码并退出
    header('Access-Control-Max-Age: 86400');
    exit(0);
}

// 验证请求是否有POST数据
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 初始化cURL会话
    $ch = curl_init(LINKEDIN_API_URL);
    
    // 设置cURL选项
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents('php://input'));  // 获取POST数据
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $_SERVER['HTTP_AUTHORIZATION'],  // 将访问令牌传递给LinkedIn
        'Content-Type: application/json',
        'X-Restli-Protocol-Version: 2.0.0'
    ]);

    // 执行cURL请求
    $result = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // 关闭cURL会话
    curl_close($ch);
    
    // 设置响应代码
    http_response_code($status);
    
    // 输出结果
    echo $result;
} else {
    // 如果不是POST请求，返回405方法不允许
    header('HTTP/1.1 405 Method Not Allowed');
    echo "Method Not Allowed";
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>LinkedIn Update</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form id="statusForm">
      <label for="status">Update:</label><br />
      <textarea id="status" name="status" rows="4" cols="50"></textarea><br />
      <input type="submit" value="UpdateLinkedIn" />
    </form>
    <script src="script.js"></script>
  </body>
</html>
