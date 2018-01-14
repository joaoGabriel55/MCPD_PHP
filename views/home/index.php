<?php
if (!isset($_SESSION['is_logged_in']))
  header('Location: ' . ROOT_URL . 'users/login');
?>

<?php if (isset($_SESSION['is_logged_in'])): ?>

 <!DOCTYPE html>
 <html>
 <head>
  <title></title>
</head>
<body>
 EAE
</body>
</html>

<?php endif; ?>







