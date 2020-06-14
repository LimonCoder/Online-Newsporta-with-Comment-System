<?php 



function datatimeformat($da){
	$dt = new DateTime($da, new DateTimezone('Asia/Dhaka'));
	$date = $dt->format('j F Y, g:i A');

	$search_array= array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ",","AM","PM"); 
	$replace_array= array("শনিবার","রবিবার","সোমবার","মঙ্গলবার","বুধবার","বৃহস্পতিবার","শুক্রবার","১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",","মধ্যাহ্ন","অপরাহ্ন");

	// convert all English char to Bangla char 
	$bangladate = str_replace($search_array, $replace_array, $date);


	return $bangladate;  
}

 

?>
