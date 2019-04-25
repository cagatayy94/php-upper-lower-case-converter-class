<?php
namespace cagatayy94;


class strChange{

    /*
     * This function changes all string chars to upper case.
     * str_raplace function changes them also but it changes only american way
     * For example: char "i" changes to "I" but in Turkish it is not correct it is wrong conversation
     *
     * For all of these I wrote that upperCase function.
     *
     * */
    public function upperCase($value){
        $alter         	                =	array("ç", "ğ", "ı", "i", "ö", "ş", "ü");
        $altered		                =	array("Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü");
        $organize		                =	str_replace($alter, $altered, $value);
        $result			                =	strtoupper($organize);
        return $result;
    }
    /*
     * This function changes all string chars to lower case.
     * str_raplace function changes them also but it changes only american way
     * For example: char "I" changes to "i" but in Turkish it is not correct it is wrong conversation
     *
     * For all of these I wrote that lowerCase Function.
     *
     * */
    public function lowerCase($value){
        $alter	                        =	array("Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü");
        $altered		                =	array("ç", "ğ", "ı", "i", "ö", "ş", "ü");
        $organize		                =	str_replace($alter, $altered, $value);
        $result			                =	strtolower($organize);
        return $result;
    }
    /*
    * This function changes all string value first char to upper case.
    * str_raplace function changes them also but it changes only american way
    * For example: char "i" changes to "I" but in Turkish it is not correct it is wrong conversation
    *
    * For all of these I wrote that upperFirst Function.
    *
    * */
    public function upperFirst($value){
        $length					       	=	strlen($value);
        $findFirstLetter				=	mb_substr($value, 0, 1, "UTF-8");
        $findAnotherLetters				=	mb_substr($value, 1, $length, "UTF-8");
        $alterL2U               		=	array("ç", "ğ", "ı", "i", "ö", "ş", "ü");
        $alteredL2U		                =	array("Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü");
        $alterU2L	                    =	array("Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü");
        $alteredU2L		                =	array("ç", "ğ", "ı", "i", "ö", "ş", "ü");
        $changeFirstLetter				=	strtoupper(str_replace($alterL2U, $alteredL2U, $findFirstLetter));
        $changeAnothers     			=	strtolower(str_replace($alterU2L, $alteredU2L, $findAnotherLetters));
        $result             			=	$changeFirstLetter . $changeAnothers;
        return $result;
    }
    /*
   * This function changes all words first chars to upper case in the string.
   * str_raplace function changes them also but it changes only american way
   * For example: char "i" changes to "I" but in Turkish it is not correct it is wrong conversation
   *
   * For all of these I wrote that upperAllWordsFirst function.
   *
   * */
    public function upperAllWordsFirst($value){
        $explode						=	explode(" ", $value);
        $wordNumber 					=	count($explode);
        $alterL2U		                =	array("ç", "ğ", "ı", "i", "ö", "ş", "ü");
        $alteredL2U		                =	array("Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü");
        $alterU2L		                =	array("Ç", "Ğ", "I", "İ", "Ö", "Ş", "Ü");
        $alteredU2L		                =	array("ç", "ğ", "ı", "i", "ö", "ş", "ü");
        $number							=	1;
        $change						    =	"";
        $result							=	"";

        foreach($explode as $word){
            $cleanWord			        =	trim($word);
            $lenght				        =	strlen($cleanWord);
            $findFirstLetter		    =	mb_substr($cleanWord, 0, 1, "UTF-8");
            $restContent		        =	mb_substr($cleanWord, 1, $lenght, "UTF-8");
            $changeFirstLetter		    =	strtoupper(str_replace($alterL2U, $alteredL2U, $findFirstLetter));
            $changeRestContent  	    =	strtolower(str_replace($alterU2L, $alteredU2L, $restContent));
            $change				       .=	$changeFirstLetter . $changeRestContent . " ";

            if($number==$wordNumber){
                $result				   .=	$change;

                return mb_convert_case(trim($result), MB_CASE_TITLE, "UTF-8");
            }

            $number++;
        }
    }

}


//There are some examples 

$strChange = new strChange();

$upper  = $strChange ->upperCase("Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir.");

echo $upper."<br>";

$lower = $strChange ->lowerCase("Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir.");

echo $lower."<br>";

$upperFirst = $strChange ->upperFirst("Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir. ");

echo $upperFirst."<br>";

$upperAllWordsFirst = $strChange ->upperAllWordsFirst("Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir.");

echo $upperAllWordsFirst."<br>";






