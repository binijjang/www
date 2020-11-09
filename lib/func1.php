<?
   function latest_article($table, $loop, $char_limit, $con_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
            $len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				$subject = str_replace( "&#039;", "'", $subject);               
                $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<div class='col1'><a href='./$table/view.php?table=$table&num=$num'>$subject</a></div> <div class='col2'>$regist_day</div>
				<div class='clear'></div>
			";
		}
		mysql_close();
   }

    /*
    
    뉴스
    <dl class="news_notice_wrap">
        <dt class="news_notice_sub_title">sk건설, 사우디서 초대형 pdh&#40;Propane Dehydrogenation&#41;플랜트의 FEED&#40;</dt>
        <dd class="news_notice_pra">sk건설이 사우디아라비아&#40;이하 사우디&#41;에서 초대형 pdh&#40;Propane Dehydrogenation&#41;플랜트의 FEED&#40;기본설계&#41;초대형PDH ...</dd>
        <dd><a href="sub4/sub4_1.html" class="news_notice_more">뉴스1</a></dd>
    </dl>
    
    공지사항
    <dl class="news_notice_wrap">
                            <dt class="news_notice_sub_title">SK건설∙한진중공업, 인천 ‘부평 SK VIEW 해모로’ 평균 105.3대 1 경쟁률로 청약 1순위 마감</dt>
                            <dd class="news_notice_pra">SK건설과 한진중공업이 인천시부평구 부개동에 분양중인 ‘부평 SK VIEW 해모로(부평 SK뷰 해모로)’가 평균 105.3대 1의 경쟁률을 나타내며 청약 1순위 ...</dd>
                            <dd><a href="sub4/sub4_2.html" class="news_notice_more">뉴스1</a></dd>
                        </dl>
    
    
    */

?>








