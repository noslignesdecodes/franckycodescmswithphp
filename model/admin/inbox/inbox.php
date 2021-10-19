<?php 

$title='Admin Inbox';


$core='view/admin/inbox/inbox.php';


$pagination=new AppPagination(ADMINROOT.'/inbox', 'page', 'pp', TOTAL_MESSAGES);

$pagination->setPerPage(10);

$inboxes=$db->query('SELECT * FROM app_inbox ORDER BY id DESC LIMIT '.$pagination->getStart().', '.$pagination->getPerPage(),false,[],true);

include ADMIN_PANEL_TEMPLATE;