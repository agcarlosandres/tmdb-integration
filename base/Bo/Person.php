<?php 

class Person
{
	var $QueryMovies;
	var $QueryPerson;
	var $QueryCredits;
	var $ErrorCurl;
	
	public function loadMovies($getData)
	{
		
		$query = $this->generateQuery($getData);
		$url="https://api.themoviedb.org/3/search/person?api_key=455275ca37d2337c5612d0dd59a01ed5&query=".$query;
		$this->QueryMovies=$this->curlConnect($url);
		if(count($this->QueryMovies)>0)
		{
			$this->loadPerson($this->QueryMovies->results[0]->id);
			$this->loadCredits($this->QueryMovies->results[0]->id);
		}
	
	}
	
	private function loadPerson($personId)
	{
		$url="https://api.themoviedb.org/3/person/".$personId."?api_key=455275ca37d2337c5612d0dd59a01ed5";
		$this->QueryPerson=$this->curlConnect($url);
	
	}
	
	private function loadCredits($personId)
	{
		$url="https://api.themoviedb.org/3/person/".$personId."/movie_credits?api_key=455275ca37d2337c5612d0dd59a01ed5&language=en-US";
		$this->QueryCredits=$this->curlConnect($url);
	
	}	
	
	private function generateQuery($getData)
	{
		$data = explode(" ",$getData);
		
		$query = '';

		for($i=0;$i<count($data);$i++)
		{
			if($i>0 and $i!=count($data)){$query=$query."+";}
			$query = $query.$data[$i];
		}
		
		return $query;
	}
	
	private function curlConnect($url)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "{}",
		));	
		
		$response = curl_exec($curl);
		
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			$this->ErrorCurl = "cURL Error #:" . $err;
		} else {
			$this->ErrorCurl = 0;
			$arr=json_decode($response);
			return $arr;
		}		
	}
}

?>