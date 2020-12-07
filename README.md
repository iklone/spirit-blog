# Spirit Blog
## Maid Spin
A new faced blog for my personal use. Built on JS with flexbox and AJAX.

Live version up at: [blog.iklone.org](http://blog.iklone.org/)

The site handles page construction modularly user-side with JS. Data is queried from the DB dynamically through AJAX and external PHP. Posts can be uploaded onsite using the /upload.html file.

To connect to a database edit the `connectExample.php` file to include your DB credentials. Then rename the file to `connect.php`. The upload password must also be set in `passwordCheck.php`. The maid database is currently private.
