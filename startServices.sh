 #!/bin/bash
service php8.1-fpm start
service php8.1-fpm status
service nginx start
service --status-all