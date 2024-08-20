<?php
// 文件路径
$counter_file = 'visit_counter.txt';
$ip_log_file = 'ip_log.txt';

// 获取访问者IP地址
$ip = $_SERVER['REMOTE_ADDR'];

// 检查是否已经记录过该IP地址
if (!file_exists($ip_log_file) || strpos(file_get_contents($ip_log_file), $ip) === false) {
    // 如果IP地址不存在，则增加计数器
    $counter = (int)file_get_contents($counter_file);
    $counter++;
    file_put_contents($counter_file, $counter, LOCK_EX);

    // 记录该IP地址已被访问过
    file_put_contents($ip_log_file, $ip . PHP_EOL, FILE_APPEND | LOCK_EX);
}

// 返回访问次数
echo "访问次数已记录";
?>