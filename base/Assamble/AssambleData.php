<?php
class AssambleData
{
	public function assambleData($personData,$moviesData,$errorData=false)
	{
		
		if($errorData)
		{
			return '<div class="error"><h2>Connection Error</h2><p>'.$errorData.'</p></div>';
		}else{
			if(count($moviesData)>0)
			{
				$dataImage=$personData->profile_path;

				if($personData->homepage==''){
					$dataProfile='<div class="name">'.$personData->name.'</div>';
				}else{
					$dataProfile='<div class="homepage"><a href="'.$personData->homepage.'" target="_blank">'.$personData->homepage.'</a></div><div class="name">'.$personData->name.'</div>';
				}

				$dataProfile=$dataProfile.'<div class="biography">'.$personData->biography.'</div>';
				$dataMovies='';

				foreach($moviesData as $movieData)
				{
					if($movieData["backdrop_path"]=="")
					{
						$imageMovie='<div class="image no-responsive"><img src="ui/img/film_roll.jpg"></div>';
					}else{
						$imageMovie='<div class="image"><img src="https://image.tmdb.org/t/p/w500/'.$movieData["backdrop_path"].'"></div>';					
					}

					$detailMovie='<div class="title">'.$movieData["original_title"].'<span>'.$movieData["release_date"].'</span></div>';
					$descriptionMovie='<div class="description">'.$movieData["overview"].'</div>';
					
					if($movieData["poster_path"]=="")
					{
						$contentDescription='<div class="content-description">'.$detailMovie.$descriptionMovie.'</div>';
					}else{
						$contentDescription='<div class="content-description-min">'.$detailMovie.$descriptionMovie.'</div>';	$contentDescription=$contentDescription.'<div class="poster"><img src="https://image.tmdb.org/t/p/w500/'.$movieData["poster_path"].'"></div>';					
					}
					
					$dataMovies=$dataMovies.'<div class="movie">'.$imageMovie.$contentDescription.'</div>';				
				}			
				##
				$contentHeader='<div class="header">Search Result</div>';
				$contentProfile='<div class="row"><div class="image no-responsive"><img src="https://image.tmdb.org/t/p/w500/'.$dataImage.'"></div><div class="profile">'.$dataProfile.'</div></div>';
				$contentMovies='<div class="row"><div class="movies"><div class="title-top">List movies</div>'.$dataMovies.'</div></div>';
				return $contentHeader.$contentProfile.$contentMovies;
			}else{
				return '<div class="row">No results...</div>';
			}
		}
	}
}
?>