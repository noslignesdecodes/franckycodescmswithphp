<div class="appMain">
    <h1>welcome</h1>
        <?php 
            //publish all members posts
            if($totalPosts){
	            foreach($membersPosts as $result)
	            {
	            	echo $result['post_title'].'<br>';
	            }
        	}else{
                echo 'no posts yet, please subscribe';
            }
        ?>
</div>