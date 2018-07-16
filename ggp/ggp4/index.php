<?php
class GroupNumber
{
 	public function getGroupNumber($group)
	{ 
		$group_number = 0;
        while($group_number <= 500) {
        	$group_number = $group_number + $group;
        	$flashMessage = new FlashMessage();
        	if($group_number <= 500 && !in_array($group_number, $flashMessage->render())) { 
        		$group_result[] = $group_number;
        		$flashMessage->add($group_number);
        	}
        }
        return $group_result;
 	}	
}
class FlashMessage {

    public static function render() {
        if (!isset($GLOBALS['messages'])) {
            return array();
        }
        $messages = $GLOBALS['messages'];
        return $messages;
    }

    public static function add($message) {
        if (!isset($GLOBALS['messages'])) {
            $GLOBALS['messages'] = array();
        }
        $GLOBALS['messages'][] = $message;
    }

    public static function clear() {
        if (isset($GLOBALS['messages'])) {
            $GLOBALS['messages'] = array();
        }
    }

}
$group_number	= new GroupNumber();

$group_20 	= $group_number->getGroupNumber(20);

$group_15 	= $group_number->getGroupNumber(15);

$group_9	= $group_number->getGroupNumber(9);

$group_5 	= $group_number->getGroupNumber(5);

$group_3 	= $group_number->getGroupNumber(3);

echo 'Group#20: '.implode(',', $group_20) . '<br/><br/>';

echo 'Group#15: '.implode(',', $group_15) . '<br/><br/>';

echo 'Group#9: '.implode(',', $group_9) . '<br/><br/>';

echo 'Group#5: '.implode(',', $group_5) . '<br/><br/>';

echo 'Group#3: '.implode(',', $group_3) . '<br/><br/>';

$flashMessage = new FlashMessage();
$flashMessage->clear();


?>
