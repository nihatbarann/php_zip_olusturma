
public function remove(){ 


		if(file_exists($this->zipName.'zip')){				 // öncelikle boyle bir dosya varmı diye kontrol ediyoruz
			unlink($this->zipName.'.zip'); 					// öyle bir dosya varsa dosyayı siliyoruz
		}
	}

}
$zip=new Ziple("yedek"); // zip dosyamızın ismi yedek.
$zip->veriekle("deneme"); // ziplenecek dosya yada klasoru belirtiyoruz



?>