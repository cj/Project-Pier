------------------------------------------------------------
<?php echo lang('do not reply warning')."\n" ?> 
------------------------------------------------------------

<?php echo lang('new ticket posted', $ticket->getSummary(), $ticket->getProject()->getName()) ?>. 

<?php
/* Send the message body unless the configuration file specifically says not to:
** to prevent sending the body of email messages add the following to config.php
** For config.php:  define('SHOW_MESSAGE_BODY', false);
*/
if ((!defined('SHOW_TICKET_BODY')) or (SHOW_TICKET_BODY == true)) {
  echo "\n----------------\n";
  if($ticket->getAssignedTo()) {
    echo lang('assigned to').': '.clean($ticket->getAssignedTo()->getObjectName())."\n";
  }
  echo lang('priority').': '.lang($ticket->getPriority())."\n";
  echo lang('state').': '.lang($ticket->getState())."\n";
  echo lang('type').': '.lang($ticket->getType())."\n";
  if($ticket->getCategory()) {
    echo lang('category').': '.clean($ticket->getCategory()->getName())."\n";
  }
  echo "\n";
  echo $ticket->getDescription();
  echo "\n----------------\n\n";
}
?>

<?php echo lang('view new ticket').":\n" ?>
- <?php echo str_replace('&amp;', '&', externalUrl($ticket->getViewUrl()))."\n" ?> 
<?php echo lang('company') ?>: <?php echo owner_company()->getName()."\n" ?> 
<?php echo lang('project') ?>: <?php echo $ticket->getProject()->getName()."\n" ?> 
<?php echo lang('author') ?>: <?php echo $ticket->getCreatedByDisplayName()."\n" ?> 

--
<?php echo externalUrl(ROOT_URL) ?>
