<?php
//Generate short url
function shortUrl($url,$conn){
    $selectData=$conn->query("select fld_short_url from tbl_short_urls where fld_long_url='$url'");
    if ($selectData->num_rows > 0) {
        while($row = $selectData->fetch_assoc()) {
            $sh_url= "https://example.com/short/".$row['fld_short_url'];
        }
    }else {
        $short_url=substr(md5($url.mt_rand()),0,8);
        $short=substr($url,26);
        $select=$conn->query("select fld_long_url from tbl_short_urls where fld_short_url='$short'");
        if ($select->num_rows > 0) {
            $sh_url= $url;
        }else{
            $sql ="INSERT INTO `tbl_short_urls`(`fld_long_url`, `fld_short_url`) VALUES ('$url','$short_url')";
            $conn->query($sql);
            $sh_url= "https://example.com/short/".$short_url;
        }
    }
    return $sh_url;
}
//Fetch long url
function longUrl($url,$conn) {
    $short_url=substr($url,26);
    $select=$conn->query("select fld_id,fld_long_url,fld_count from tbl_short_urls where fld_short_url='$short_url'");
    if ($select->num_rows > 0) {
        while($row = $select->fetch_assoc()) {
            $count=$row['fld_count']+1;
            $sql="UPDATE tbl_short_urls SET fld_count=".$count." WHERE fld_id=".$row['fld_id'];
            $conn->query($sql);
            $data= $row['fld_long_url'];
        }
    } else {
        $data= "No result found";
    }
    return $data;
}
//Fetch number of times it has been looked up
function viewCountUrl($url,$conn) {
    $short_url=substr($url,26);
    $select=$conn->query("select fld_count from tbl_short_urls where fld_short_url='$short_url'");
    if ($select->num_rows > 0) {
        while($row = $select->fetch_assoc()) {
            $data=$row['fld_count'];
        }
    }else {
        $data= "No result found";
    }
    return $data;
}
?>