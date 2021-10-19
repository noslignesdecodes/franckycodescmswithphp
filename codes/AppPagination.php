<?php

class AppPagination 
{
	protected $start;
	protected $page;
	protected $perPage;
	protected $total;
	protected $page_get_var;
	protected $per_page_get_var;
	protected $target;
	protected $totalArticles;
	protected $current;
	protected $idSection;
	protected $translator;
	public function __construct($target, $page, $perPage, $total_articles, $idSection = '#profile', $setPerPage=5) {
		 
		$this->idSection = $idSection;
		$this->target = $target;
		$this->page = isset ( $_GET [$page] ) ? ( int ) $_GET [$page] : 1;
		$this->perPage = isset ( $_GET [$perPage] ) ? ( int ) $_GET [$perPage] : $setPerPage;
		$this->page_get_var = $page;
		$this->per_page_get_var = $perPage;
		$this->totalArticles = ( int ) $total_articles;
		$this->check ();
		$this->current = 1;
	}

	public function setId($newId) {
		$this->idSection = $newId;
	}
	public function getTotalPages() {
		return $this->total;
	}
	public function getTotalArticles() {
		return $this->totalArticles;
	}
	public function getTarget() {
		return $this->target;
	}
	public function check() {
		$this->start = ($this->page > 0 )? $this->page * $this->perPage - $this->perPage : 0;
		$this->total = ( int ) ceil ( $this->totalArticles / $this->getPerPage () ); // calculate total pages
		$this->total = $this->total > 1 ? $this->total : 1;
		$this->page = $this->page < 0 ? abs ( $this->page ) : $this->page; 
	}
	public function getPerPage() {
		return $this->perPage;
	}
	public function getCurrent() {
		$current = 1;
		for($i = 1; $i <= $this->total; $i ++) {
			$current = ($i == $this->page) ? $i : $current;
		}
		$this->current = $current;
		return $this->current;
	}
	public function getStart() {
		return $this->start;
	}
	public function display() {
		$this->check ();
		echo '<div class="pagination">';
		for($i = 1; $i <= $this->total; $i ++) {
			echo '<a href="' . $this->target . '&amp;' . $this->page_get_var . '= ' . $i . '&amp;' . $this->per_page_get_var . '=' . $this->perPage . '#" ' . ($i == $this->page ? ' class="current" ' : '') . '>' . $i . '</a>';
		}
		echo '</div>';
	}
	public function show(){
		echo '<input type="hidden" id="app-pagination-total" value="'.$this->getTotalPages().'">';
		echo '<input type="hidden" id="app-pagination-actual" value="'.$this->getCurrent().'">';

		$this->googleLike();
		// echo '<div class="app-text-center" id="app-new-pagination-container" ><a href="'. $this->target . '?' . $this->page_get_var . '=' . $this->getCurrent() . $this->idSection . '" class="app-bt" id="app-new-pagination">'.$this->translator->show('afficher plus').'</a></div>';
	}
	public function setPerPage($perPage) {
		$this->perPage = $perPage;
		$this->check ();
	}
	public function admin(){
		$this->googleLike();
		echo 'total pages = '.$this->getTotalPages().'<br>';
	}
	  
	public function googleLike($what='', $recents='&lt;', $old='&gt;') {
		if($this->getTotalPages()>1){
		$prevText =  $what.' '.$old ;
		$nextText = $recents.' '.$what;
		if ($this->page > $this->getTotalPages ()) {
			// $this->page = 1;
			// echo $this->current;
			// $this->getTotalPages();
			// if (isset ( $_SESSION ['idUser'] )) {
			// 	$user = new  Mpitsidika($_SESSION['idUser']); 
			// 	$user->receiveMessage('Dear '.$user->getPseudo().' page '.$this->page.' not found.');
				//echo '<div class="notFound"><p>Hey this is Peniela, I\'m the core of this website, it seems like you try to access to a page that clearly doesn\'t exist, didn\'t I mentioned that in the pagination interface? Why the hell in the world you do that? You\'re an idiot, right?</p></div>';
			//}  
			//require_once FRANCKWEBROOT.'features/error/error.php';
			//Security::pageNotFound();
			
		} 
		else 
		{ 
			$this->check ();
			echo '<div id="app-pagination"  >';
			//echo '<p>Pagination</p>';
			echo '<nav > ';
			$current = $this->getCurrent ();
			//echo '<a id="app-pagination-current-page"   href="' . $this->target . '?' . $this->page_get_var . '=' . $current . $this->idSection . '"  >page actuelle</a>';
			// echo '<li><a href="' . $this->target . '"><input type="button" value="***1***" id="firstPage"></a></li>';
			// previous algorithm taking per page parameter
			// $previous = $current - 1 > 0 ? '<a href="' . $this->target . '&amp;' . $this->page_get_var . '=' . ($current - 1) . '&amp;' . $this->per_page_get_var . '=' . $this->perPage . '#" id="previous"><input type="button" id="previousPage" value="&lt;&lt; Previous "></a>' : '';
			// this one is previous algorithm without per page parameter
			$previous = $current - 1 > 0 ? '<a id="previousBt" class="basicbtn" href="' . $this->target . '?' . $this->page_get_var . '=' . ($current - 1) . $this->idSection . '"    >&lt;</a>' : 0;
			if($previous){
				echo   $previous  ;
			}
			// echo '<li><a href="' . $this->target . '&amp;' . $this->page_get_var . '=' . $current . '&amp;' . $this->per_page_get_var . '=' . $this->perPage . '#" id="current"><input type="button" id="currentPage" value="Pejy ' . $current . '/' . $this->total . '"></a></li>';
			// $next = $current + 1 <= $this->total ? '<a href="?page=' . ($current + 1) . '&amp;limit=' . $this->perPage . '" id="next">manaraka</a>' : '';
			// $next = $current + 1 <= $this->total ? '<a href="' . $this->target . '&amp;' . $this->page_get_var . '=' . ($current + 1) . '&amp;' . $this->per_page_get_var . '=' . $this->perPage . '#" id="next"><input type="button" id="nextPage" value="Next &gt;&gt;"></a>' : '';
			$next = $current + 1 <= $this->total ? '<a class="basicbtn" id="nextBt" href="' . $this->target . '?' . $this->page_get_var . '=' . ($current + 1) . $this->idSection . '"   >&gt;</a>' : 0;
			if($next){
				echo  $next ;
			}
			echo '</nav>';
			

			/*echo '<p class="inline">Page <a class="bt" href="' . $this->target . '?' . $this->page_get_var . '=' . $this->getCurrent () . '">' . $this->getCurrent () . '</a>/<a class="bt"  href="' . $this->target . '?' . $this->page_get_var . '=' . $this->getTotalPages () . '">' . $this->getTotalPages () . '</a></p>';
			echo '<p>';
			$total = $this->getTotalPages();

			if($this->getCurrent()!=1){
				echo 'Premiere page: ';
				echo '<a class="bt" href="' . $this->target . '?' . $this->page_get_var . '=1">1</a>';
			}
			
			if($this->getCurrent()!=$this->getTotalPages()){
				echo '<br>Derniere page: ';
				echo '<a class="bt" href="' . $this->target . '?' . $this->page_get_var . '='.$this->getTotalPages().'">'.$this->getTotalPages().'</a>';
			}
			echo '</p>';*/


			// if($this->getTotalPages()>10)
			// {
			// 	echo '<p id="allPages">'.Translator::go('pejy rehetra').': ';
			// 	for($i=1, $c = $this->getTotalPages(); $i <= $c;$i++)
			// 	{
			// 		echo '<a class="bt   '.($this->getCurrent()==$i?' currentPage  ':'').'" href="' . $this->target . '?' . $this->page_get_var . '='.$i.'">'.$i.'</a>';
			// 	} 
			// 	echo '</p>';
			// }


			/*
			if($this->getTotalPages()>10)
			{
				echo '<p id="allPages">pejy rehetra: ';
				
				if($this->getCurrent()-1>0)
				{
					echo '<a class="bt" href="'.$this->target.'?'.$this->page_get_var.'='.($this->getCurrent()-1).'">&lt;</a>';
				}

				if($this->getCurrent()>10)
				{
					echo '<a class="bt" href="'.$this->target.'?'.$this->page_get_var.'=1">1</a>';
				
					echo '<a class="bt" href="'.$this->target.'?'.$this->page_get_var.'=3">...</a>';
				
				}

				if($this->getCurrent()-5>0)
				{
					for($i= $this->getCurrent()-5, $c = $this->getCurrent(); $i < $this->getCurrent();$i++)
					{
						echo '<a class="bt" href="' . $this->target . '?' . $this->page_get_var . '='.$i.'">'.$i.'</a>';
					} 
				}
				echo '<a class="bt  currentPage" href="' . $this->target . '?' . $this->getCurrent() . '='.$this->getCurrent().'">'.$this->getCurrent().'</a>';

				if(($this->getCurrent()+5)<$this->getTotalPages() )
				{
					for($i= $this->getCurrent()+1 , $c =$this->getCurrent()+5; $i < $c;$i++)
					{
						echo '<a class="bt" href="' . $this->target . '?' . $this->page_get_var . '='.$i.'">'.$i.'</a>';
					} 
				}

				if($this->getCurrent()<$this->getTotalPages() )
				{
					echo '<a class="bt" href="'.$this->target.'?'.$this->page_get_var.'='.($this->getTotalPages()-1).'">...</a>';
				
					echo '<a class="bt" href="'.$this->target.'?'.$this->page_get_var.'='.($this->getTotalPages()).'">'.$this->getTotalPages().'</a>';
				
				}
				if(($this->getCurrent()+1<$this->getTotalPages()))
				{
					echo '<a class="bt" href="'.$this->target.'?'.$this->page_get_var.'='.($this->getCurrent()+1).'">&gt;</a>';
				}
				echo '</p>';
			}

			*/
			echo '</div>';
			 
			} // end else
		} 
	}
}
