## Laravel 8 & AdminLTE 3 & Auth 
### Install NPM Package & Composer Package

```
$ composer install   --> ติดตั้ง package ต่าง ๆ ของ php
```

```
$ npm i หรือ npm install   --> ติดตั้ง package ต่าง ๆ ของ node
```

###  Usage

1. Copy .env.example  -> ส้รางไฟล์ใหม่ชื่อ .env
2. Setup Env:  .env แก้ไขชื่อดาต้าเบสและรหัสผ่านให้ถูกต้อง
3. สร้างตารางโดยใช้คำสั่งด้านล่าง

```
$ php artisan migrate:fresh
```

### Run Project

```
$ php artisan serve
```

ใส่ port ที่ต้องการ
```
$ php artisan serve --port=9000
```

### Preview
-- Login Page --
![image2](https://user-images.githubusercontent.com/67111961/149990261-7fc091ba-a337-4fd5-bf13-05931bf7e925.PNG)

-- Home --
![image1](https://user-images.githubusercontent.com/67111961/149990278-f12aef32-67fa-4fa5-b7ec-7962a8d9abf4.PNG)
