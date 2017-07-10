<?php
	if( is_active_sidebar('main-sidebar') ) :
		dynamic_sidebar('main-sidebar');
	else :
		_e('this is side bar. You have to add some widgets', 'ducthinh');
	endif;

?>