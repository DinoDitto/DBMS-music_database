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
