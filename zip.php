<?php 

class Ziple extends ZipArchive {


	protected $zipName;

	 function __construct($isim){

			$this->zipName=$isim;                         		      //oluşturacağımız zip dosyasına isim veriyoruz
			$this->remove();						//oluşturacağımız bir zip dosyası adında dosya varsa onu silip tekrar aynı isimde yukluyoruz	
			$this->open($isim.'.zip',ZipArchive::CREATE);                //verdiğimiz isimde zip dosyasını oluşturuyoruz.

	}
public function veriekle($dosya){ 						//hangi klasoru veya dosyayı zipleyeceksek onu methoda gonderiyoruz


			$dizin=glob($dosya.'/*');
			foreach ($dizin as  $deger) {

			if(is_dir($deger)){
				$this->veriekle($deger);                   //gonderdiğimiz isim klasorse oluşturuduğumuz method çalışacak

			}
			elseif(is_file($deger)){ 						//dosya ise ZipArchive de dosyalar için bulunan methodu çağırıyoruz 
				$this->addFile($deger,$deger);
						}
							}
		 						}

public function remove(){ 


		if(file_exists($this->zipName.'zip')){				 // öncelikle boyle bir dosya varmı diye kontrol ediyoruz
			unlink($this->zipName.'.zip'); 					// öyle bir dosya varsa dosyayı siliyoruz
		}
	}

}
$zip=new Ziple("yedek"); // zip dosyamızın ismi yedek.
$zip->veriekle("deneme"); // ziplenecek dosya yada klasoru belirtiyoruz



?>