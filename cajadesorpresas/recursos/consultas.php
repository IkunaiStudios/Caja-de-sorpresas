<?php 
	
	//Limite character in index articles
	function LimitChar($string, $limite){

    	$string = strip_tags($string);

    	if (strlen($string) > $limite) {

    		// truncate string
    		$stringCut = substr($string, 0, $limite);

    		// make sure it ends in a word so assassinate doesn't become ass...
    		$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
    	}
    	return $string;
    	    
    }
    //using in index and panel
	function GetPagArticles($conexion, $page, $lastpage){
		if($conexion):
			$consulta = "SELECT * FROM articles ORDER BY id DESC limit $page, $lastpage";
			$gotQuery = $conexion->query($consulta);									
			return $gotQuery;
		else:
			echo "no hay conexion";
		endif;
		

	}
	
	function PaginationArticles($conexion, $somepage){
		if($conexion):
			$consulta = "SELECT * FROM articles";
			$gotQuery = $conexion->query($consulta);
			$count = $gotQuery->fetchAll();				
			if($count < 0)
			{
				echo "No hay datos";
			}
			else
			{
				
				$counted = count($count);
				$limit = $counted/$somepage;				
				$myLimit = ceil($limit);

				return $myLimit;
			}
		else:
			echo "no hay conexion";
		endif;
		

	}

	//article.php
	function GetArticle($conexion, $id){
		if($conexion){
			$consulta = "SELECT * FROM articles where id= $id";
			$gotQuery = $conexion->query($consulta);
			return $gotQuery;
		}else{
			echo "No hay conexion";
		}
	}

	function GetArticleRandom($conexion){
		if($conexion){
			$consulta = "SELECT * FROM articles ORDER BY RAND() LIMIT 3;";
			$gotQuery = $conexion->query($consulta);
			return $gotQuery;
		}else{
			echo "No hay conexion";
		}
	}
	
    // login form
    function Login($conexion, $email, $password){
    	if($conexion):
    		$consulta = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    		$gotQuery = $conexion->query($consulta);
    		$count = $gotQuery->fetchAll();
    		//trabajar aqui
    		if(count($count) == 1){
    			return $count;
    		}
    		else{
    			return FALSE;
    		}
    	endif;
    }

    //using in nuevolibro adding new book
    function AddUsers($conexion, $email, $name, $password, $admin){
    	if($conexion):
			$consulta = "INSERT INTO users (email, name, password, administrator) VALUES ('$email', '$name', '$password', $admin)";
			$conexion->query($consulta);
		else:
			echo "no hay conexion";
		endif;
    }

    //using in nuevolibro adding new book
    function AddArticle($conexion, $title, $body, $date, $author, $fate){
    	
    	if($conexion):

			$consulta = "INSERT INTO articles (name, body, date, author, img) VALUES ('$title', '$body', '$date', '$author', '$fate')";
			$conexion->query($consulta);
		else:
			echo "no hay conexion";
		endif;
    }

    function EditArticle($conexion, $id, $title, $body, $date, $author, $fate){
    	if($conexion):
			$consulta = "UPDATE articles SET name='$title', body='$body', date='$date', author = '$author', img = '$fate' WHERE id = $id";
			$conexion->query($consulta);
		else:
			echo "no hay conexion";
		endif;
    }

    function DeleteArticle($conexion, $id){
    	if($conexion):
			$consulta = "DELETE FROM articles WHERE id = '$id'";
			$conexion->query($consulta);
		else:
			echo "no hay conexion";
		endif;
    }

 ?>


