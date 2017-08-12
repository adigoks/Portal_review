
<div id="menu_config">
	</br>
	<?php
		var_dump($list);
		if(!empty($list))
		{
			foreach ($list as $key) {
			
				$id = $key['id'];
				echo "	<div>
						$key[menu_name];
						</div>";
				foreach ($list as $key1) {
					if($key['menu_parent'] == $id)
					{
						echo "	<div>
						<span>aa </span>
						$key[menu_name];
						</div>";
					}
					
				}
				
			}
		}else{
			

		}
		
	?>
	
</div>