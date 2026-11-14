
<?php
function postIndex($index, $value = "")
{
    if (!isset($_POST[$index])) return $value;
    return trim($_POST[$index]);
}

function checkUserName($string)
{
    if (preg_match("/^[a-zA-Z0-9._-]+$/", $string))
        return true;
    return false;
}

function checkEmail($string)
{
    if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $string))
        return true;
    return false;
}

function checkPassword($string)
{
    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/", $string))
        return true;
    return false;
}

function checkPhone($string)
{
    if (preg_match("/^[0-9]+$/", $string))
        return true;
    return false;
}

function checkBirthDate($string)
{
    if (preg_match("/^(0[1-9]|[12][0-9]|3[01])[\/-](0[1-9]|1[0-2])[\/-][0-9]{4}$/", $string))
        return true;
    return false;
}

$sm = postIndex("submit");
$username = postIndex("username");
$email = postIndex("email");
$password = postIndex("password");
$date = postIndex("date");
$phone = postIndex("phone");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab6_3</title>

<style>
fieldset {
    width: 50%;
    margin: 100px auto;
}

.info {
    width: 600px;
    color: #006;
    background: #6FC;
    margin: 0 auto;
    padding: 10px;
}

#frm1 input {
    width: 300px;
}
</style>

</head>

<body>

<fieldset>
<legend style="margin:0 auto">Đăng ký thông tin</legend>

<form action="lab06_3.php" method="post" enctype="multipart/form-data" id="frm1">

<table align="center">

    <tr>
        <td width="88">UserName</td>
        <td width="317">
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" />*
        </td>
    </tr>

    <tr>
        <td>Mật khẩu</td>
        <td>
            <input type="password" name="password" />*
        </td>
    </tr>

    <tr>
        <td>Email</td>
        <td>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" />*
        </td>
    </tr>

    <tr>
        <td>Ngày sinh</td>
        <td>
            <input type="text" name="date" value="<?php echo htmlspecialchars($date); ?>" />*
        </td>
    </tr>

    <tr>
        <td>Điện thoại</td>
        <td>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" />
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="submit" name="submit" />
        </td>
    </tr>

</table>
</form>
</fieldset>

<?php

if ($sm != "")
{
    $err = "";

    if (checkUserName($username) == false)
        $err .= "Username không hợp lệ! Chỉ được dùng a-z, A-Z, số 0-9, ., _ và -.<br>";

    if (checkPassword($password) == false)
        $err .= "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ hoa, chữ thường và số.<br>";

    if (checkEmail($email) == false)
        $err .= "Định dạng Email sai!<br>";

    if (checkBirthDate($date) == false)
        $err .= "Ngày sinh phải có định dạng dd/mm/yyyy hoặc dd-mm-yyyy.<br>";

    if ($phone != "" && checkPhone($phone) == false)
        $err .= "Số điện thoại chỉ được nhập số!<br>";

?>

<div class="info">

<?php

    if ($err != "")
    {
        echo "<b>Lỗi:</b><br>";
        echo $err;
    }
    else
    {
        echo "<b>Đăng ký thành công!</b><br>";
        echo "Username: " . htmlspecialchars($username) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Ngày sinh: " . htmlspecialchars($date) . "<br>";
        echo "Điện thoại: " . htmlspecialchars($phone) . "<br>";
    }

?>

</div>

<?php
}
?>

</body>
</html>
