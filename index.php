<?php
$host     = getenv('MYSQLHOST') ?: 'localhost';
$dbname   = getenv('MYSQLDATABASE') ?: 'testdb';
$username = getenv('MYSQLUSER') ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$port     = getenv('MYSQLPORT') ?: '3306';

$conn = new mysqli($host, $username, $password, $dbname, $port);
?>
<!DOCTYPE html>
<html>
<head>
<title>Two-Tier Architecture - Subhasree M</title>
<style>
body{font-family:monospace;background:#0a1628;color:#e2e8f0;display:flex;justify-content:center;align-items:center;min-height:100vh;margin:0;}
.box{padding:40px;border-radius:12px;text-align:center;max-width:600px;}
.ok{background:#052e16;border:2px solid #16a34a;}
.fail{background:#2d0f0f;border:2px solid #dc2626;}
h1{font-size:1.8em;margin-bottom:16px;}
.ok h1{color:#4ade80;}
.fail h1{color:#f87171;}
p{color:#94a3b8;margin:8px 0;font-size:1em;}
.detail{background:#0d2137;padding:16px;border-radius:8px;margin-top:20px;text-align:left;}
.detail p{color:#7dd3fc;font-size:0.9em;}
</style>
</head>
<body>
<?php if ($conn->connect_error): ?>
<div class="box fail">
  <h1>&#10007; Database Connection: FAILED</h1>
  <p>Could not connect to MySQL database</p>
  <div class="detail">
    <p>Error: <?= htmlspecialchars($conn->connect_error) ?></p>
    <p>Host: <?= htmlspecialchars($host) ?></p>
  </div>
</div>
<?php else: ?>
<div class="box ok">
  <h1>&#10003; Database Connection: OK</h1>
  <p>Web Server successfully connected to MySQL Database</p>
  <div class="detail">
    <p>&#9679; Architecture: Two-Tier (Public + Private)</p>
    <p>&#9679; Web Tier: Railway PHP Server (Public)</p>
    <p>&#9679; DB Tier: Railway MySQL (Private/Internal)</p>
    <p>&#9679; Database: <?= htmlspecialchars($dbname) ?></p>
    <p>&#9679; Status: Verified &#10003;</p>
    <p>&#9679; Author: Subhasree M</p>
  </div>
</div>
<?php endif; ?>
<?php $conn->close(); ?>
</body>
</html>
