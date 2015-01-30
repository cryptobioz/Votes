<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Vote</title>

    <!-- Stylesheet CSS -->
    <?php echo $this->Html->css(array('foundation.min', 'style')); ?>

  </head>

  <body>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="http://labx.fr"><img class="logo" src="/img/labx-bordeaux.svg" alt=""/></a></h1>
    </li>
    <li class="toggle-topbar menu-icon">
      <a href="#"><span>Menu</span></a>
    </li>
  </ul>
  <section class="top-bar-section">
    <ul class="right">
      <li><a href="/new/">Nouveau vote</a></li>
      <li><?php echo $this->Html->link('Votes en cours', array('controller'=>'votes', 'action'=>'list_votes')); ?></li>
      <li><?php echo $this->Html->link('Archives', array('controller'=>'votes', 'action'=>'archives')); ?></li>
      <li><?php echo $this->Html->link('Déconnexion', array('controller'=>'connect', 'action'=>'disconnect')); ?></li>
    </ul>
  </section>
</nav>

<section>
<?php echo $this->fetch('content'); ?>
</section>
  </body>
</html>
