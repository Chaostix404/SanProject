<?
function chaoshash($k)
{
  $salt = md5('Chaostix');
  $k = base64_encode($salt ^ $k ^ $salt);
}
function unhash($k)
{
  echo "<textarea>". base64_decode($k). "</textarea>";
}
