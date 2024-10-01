# 音樂資料庫
以XAMPP建立Apache網頁伺服器，並使用phpMyAdmin管理資料庫

## 實體關聯圖 (Entity Relationship Diagram)
<img src="images/Entity Relationship Diagram.jpg" width="75%">

## 關聯綱目 (Relational schema)
<img src="images/Relational schema.jpg" width="75%">

## 建置資料表
* 資料表 ‵user‵
```
CREATE TABLE `user` (
`id` int(11) NOT NULL,
`name` text NOT NULL,
`gender` text NOT NULL,
`birth` date NOT NULL,
`Email` varchar(50) NOT NULL,
`phoneNum` char(10) NOT NULL,
`userAccount` varchar(30) NOT NULL,
`userPasswword` varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=
utf8mb4_unicode_ci;
```
* 資料表 ‵song‵
```
CREATE TABLE ` song ` (
`id` int(11) NOT NULL,
`songTitle` text NOT NULL,
`singer` text NOT NULL,
`album` text NOT NULL,
`type` text NOT NULL,
`year` year(4) NOT NULL,
`length` time NOT NULL,
) ENGINE = InnoDB DEFAULT CHARSET=
utf8mb4_unicode_ci;
```
* 資料表 ‵playlist‵
```
CREATE TABLE ` playlist ` (
`id` int(11) NOT NULL,
`playlistTitle` text NOT NULL,
`user_id` int(30) NOT NULL,
) ENGINE = InnoDB DEFAULT CHARSET= 
utf8mb4_unicode_ci;
```
* 資料表 ‵song_in_playlist‵
```
CREATE TABLE ` song_in_playlist ` (
`id` int(11) NOT NULL,
`song_id` int(30)NOT NULL,
`playlist_id` int(30) NOT NULL,
) ENGINE = InnoDB DEFAULT CHARSET=
utf8mb4_unicode_ci;
```

## 程式檔案說明
此資料庫之前端網頁功能包含:
<br>
* 使用者介面
1. 註冊
&emsp;<br>register.html / register.php
2. 登入
&emsp;<br>firstpage.php / login.php
3. 登出
&emsp;<br>logout.php
4. 首頁
&emsp;<br>welcome.php
5. 顯示: 所有歌曲、所有歌曲清單、特定歌曲清單中所有歌曲
&emsp;<br>show.php
6. 查詢
&emsp;<br>select_plat.html / select.php
7. 新增
&emsp;<br>add_plat.html
&emsp;<br>(a)新增播放清單: add_playlist.html / add_playlist.php
&emsp;<br>(b)新增歌曲至播放清單: add_song_to_list.php
&emsp;<br>&emsp;&nbsp;先列出所有歌曲 ⭢ 選擇要加入歌曲的播放清單 ⭢ 前端輸入
8. 刪除
&emsp;<br>delete_plat.html
&emsp;<br>(a)新增播放清單: delete_playlist.html / delete_playlist_alert.php
&emsp;<br>(b)從播放清單刪除歌曲: delete_song_to_playlist.php
&emsp;<br>&emsp;&nbsp;先展示要做刪除的清單 ⭢ 展示出清單中目前的歌曲 ⭢ 輸入要刪除的歌名
9. 修改密碼
&emsp;<br>alter_password.php

* 管理者介面
1. 管理者登入
&emsp;<br>manage_login.php / manage_login_back.php
2. 管理者首頁: 可列出資料庫所有歌曲
&emsp;<br>manage_index.php
3. 新增資料庫歌曲
&emsp;<br>manage_add.php
&emsp;<br>表單輸入 ⭢ 新增歌曲
4. 刪除資料庫歌曲
&emsp;<br>manage_del.php
&emsp;<br>顯示歌曲 ⭢ 前端輸入 ⭢ 刪除歌曲
