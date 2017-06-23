# PhpFinalProject

【資料表】

articles-----------------------------

article_id:	討論串本身編號（自動）
account:	討論串發表者的帳號（依登入狀態）
title:		討論串的標題
content:	討論串主樓的內容
time:		討論串開串時間（自動）

comments-----------------------------

comment_id:	留言本身編號（自動）
account:	留言發表者的帳號（依登入狀態）
article:	留言所屬的討論串編號（依發表時所屬的討論串）
content:	留言內容
time:		留言時間（自動）

mails--------------------------------

mail_id:	信件編號（自動）
id_from:	寄件者（依寄信時登入狀態）
id_to:		收件者
title:		信件標題
content:	信件內容
time:		發送時間（自動）
read_status:	已讀狀態（自動；0=未讀，1=已讀）

users--------------------------------

no:		使用者編號（自動）
name:		使用者暱稱
gender:		性別
age:		年齡
account:	帳號
password:	密碼
authority:	權限


【檔案】

add.php			管理者新增使用者資料
article.php		觀看討論串內容
comment_apply.php	發表留言（送出指令）
del.php			刪除用戶（送出指令）
header.php		標題圖、上方功能欄
include.php		資料庫讀寫用
index.php		首頁
login.php		登入介面
logout.php		登出
mail.php		撰寫站內信
mail_apply.php		發送站內信（送出指令）
mail_list.php		收信匣
mail_read.php		觀看信件詳細內容
post.php		發表文章（即新增討論串）
post_apply.php		發表文章（送出指令）
register.php		註冊為新用戶
style.css		樣式
update.php		管理員修改用戶資料
update_apply.php	管理員修改用戶資料（送出指令）
user_manage.php		用戶資料列表
userupdate.php		修改自身個人資料
userupdate_apply.php	修改自身個人資料（送出指令）
