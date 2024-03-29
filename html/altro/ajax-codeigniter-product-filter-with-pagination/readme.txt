In order to make change to your website there are major 3 files :-

1.application/views/product_filter.php
1.application/models/Product_filter_model.php
3. application/controllers/Product_filter.php

You have to change the following to make it live:-

1. Go to application/config/config.php 
    on line number 26 change $config['base_url'] = 'yourweb_url';

2.  Go to application/config/database.php 
      on line number 78, 79, 80, 81 change your database setting

