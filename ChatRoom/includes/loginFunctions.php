<?php
date_default_timezone_set ('Asia/Macau');

function checkFailedLogins($uid, $conn)
{
  $sql = "SELECT login_time FROM login_fail WHERE username = '$uid';";
  $result = mysqli_query($conn, $sql);
  $check = mysqli_num_rows($result);
  $fails = 0;

  if($check >= 2)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      if(timeDifference(time(), strtotime($row['login_time'])) < 10)
        $fails++;

      if($fails >=2)
      {
        blockUser($uid, $conn);
        $alert = "Failed to type the correct password 5 times. You won't be able to acces your account for 30 minutes.";
        echo "<script type='text/javascript'>
                alert('$alert')
                location='../../index.php?login=unsuccessful'</script>";
      }
    }
  }

  $sql = "INSERT INTO login_fail (username) VALUES ('$uid');";
  mysqli_query($conn, $sql);
}

function timeDifference($currTime, $prevTime)
{
  return round(abs($currTime - $prevTime) / 60,2);
}

function blockUser($uid, $conn)
{
  $time = date("Y-m-d H:i:s", time());

  $sql = "UPDATE users
          SET user_block = 1, date_blocked = '$time'
          WHERE user_uid = '$uid'";

  mysqli_query($conn, $sql);

  $sql = "DELETE login_fail
          WHERE user_uid = '$uid'";

  mysqli_query($conn, $sql);
}

function userBlocked($uid, $conn)
{
  $sql = "SELECT user_block
          FROM users
          WHERE user_uid = '$uid'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  return $row['user_block'];
}

function setSessionVariables(&$secret, &$ip, &$captcha, &$rsp, $uid)
{
  $secret = "6LfXUD0UAAAAAGJcwCp_pmSCG8RyPz6bruv-M-7u";
  $ip = $_SERVER['REMOTE_ADDR'];
  $_SESSION["uid"] = $uid;
  $captcha = $_POST['g-recaptcha-response'];
  $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
}

function canUnblock($uid, $conn)
{
  $sql = "SELECT date_blocked
          FROM users
          WHERE user_uid = '$uid'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $timeElapsed = timeDifference(time(), strtotime($row['date_blocked']));

  if($timeElapsed > 2)
  {
    $sql = "UPDATE users
            SET user_block = 0, date_blocked = 'NULL'
            WHERE user_uid = '$uid'";

    mysqli_query($conn, $sql);
    clearFails($uid, $conn);
    return 1;
  }

  echo "User blocked. Please try again later after.";
  return 0;
}

function updateFails($uid, $conn)
{
  $currTime = date("Y-m-d H:i:s", time());

  $sql = "DELETE FROM login_fail
          WHERE username = '$uid' AND TIMESTAMPDIFF(MINUTE, login_time, '$currTime') > 10";

  mysqli_query($conn, $sql);
}

function clearFails($uid, $conn)
{
  $sql = "DELETE FROM login_fail
          WHERE username = '$uid'";

  mysqli_query($conn, $sql);
}
?>
